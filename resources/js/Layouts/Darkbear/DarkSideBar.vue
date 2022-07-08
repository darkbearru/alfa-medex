<template>
    <aside id="sidebar"
           aria-label="Sidebar"
           class="hidden md:fixed left-0 z-20 flex-col flex-shrink-0 w-64 h-full transition-width transition-x  duration-500">
        <div
            class="flex relative flex-col flex-1 pt-0 min-h-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex overflow-y-auto flex-col flex-1 pt-5 pb-4">
                <DarksideBarPanel>
                    It's panel 1
                </DarksideBarPanel>
            </div>
        </div>
    </aside>
</template>

<script setup>
import DarksideBarPanel from "@/Components/Darkbear/DarksideBarPanel";</script>
