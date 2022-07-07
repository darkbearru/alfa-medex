<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->default(0);//->constrained('catalogs')->cascadeOnDelete();
            $table->string('token', 50)->index();
            $table->string('name');
            $table->integer('children_count')->default(0);
            $table->longText('description');
            $table->timestamps();
        });

        //DB::statement('DROP TRIGGER  catalog_update_insert on catalogs');
        //DB::statement('DROP FUNCTION update_catalog_counters()');
        DB::statement('CREATE OR REPLACE FUNCTION update_catalog_counters() RETURNS TRIGGER as $catalog_update$
            BEGIN
                IF (NEW.parent_id > 0) THEN
                    UPDATE catalogs SET children_count=children_count + 1 WHERE id = NEW.parent_id;
                end if;
                RETURN NEW;
            END;
            $catalog_update$ LANGUAGE plpgsql;'
        );
        DB::statement('CREATE TRIGGER catalog_update_insert
            BEFORE INSERT OR UPDATE ON catalogs
            FOR EACH ROW EXECUTE FUNCTION update_catalog_counters();'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
