<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import coverImage from '@/pages/Laboratory/Computer/computer.jpeg';
</script>


<template>
    <AppLayout>
        <div class="p-8 lg:p-16 w-full" data-ast-blocks-layout="true" itemprop="text">
            <h1 class="mb-4">Computer Lab</h1>
            <img :src="coverImage" alt="" class="w-full object-cover">
            <p class="text-gray-700 pt-8">
                <span class="me-10"></span>The Computer Lab serves as a vital center for digital learning and academic development within the institution. It is designed to meet the evolving technological needs of students and faculty by providing a well-structured and resource-rich environment. The lab is equipped with 2 dedicated servers and 21 client systems, all configured through an N-Computing setup, which allows multiple users to share computing resources efficiently while reducing hardware and energy costs.
                The N-Computing architecture significantly enhances the manageability and scalability of the lab. It centralizes processing through the servers while providing individual access points for students, maintaining performance without the need for fully independent desktop units. This setup also simplifies maintenance, upgrades, and software deployment across the lab.
                <br>
                <br>
                <span class="me-10"></span>The lab features modern computing systems with updated hardware and licensed software to support programming, design, simulation, and other curriculum-related applications. It is further strengthened by a high-speed internet connection, enabling smooth access to cloud platforms, research databases, and online learning tools. The seamless connectivity supports both academic instruction and independent student research.
                <br>
                <span class="me-10"></span>To ensure reliability, especially during power fluctuations, the lab is backed by a 2 KVA Uninterruptible Power Supply (UPS). This UPS provides sufficient backup to allow safe shutdown of systems and continuity of work for a limited period during outages, preventing data loss and hardware damage.
                <br>
                <span class="me-10"></span>Overall, the Computer Lab is a well-maintained, tech-enabled facility that promotes hands-on learning, technical skill development, and digital literacy among students. It supports a wide range of academic programs and serves as a backbone for technology-driven education in the institution. Through its efficient infrastructure and networked systems, the lab stands as a model of smart resource utilization and educational innovation.
            </p>
        </div>
    </AppLayout>
</template>