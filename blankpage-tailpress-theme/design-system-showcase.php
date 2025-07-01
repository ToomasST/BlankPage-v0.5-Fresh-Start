<?php
/**
 * Template Name: Design System Showcase
 * 
 * Estonian BlankPage Design System - Visual Showcase
 * All components and styles using Tailwind CSS 4.0 + Estonian brand colors
 */

get_header(); ?>

<main class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-6xl font-bold text-gray-900 mb-4">BlankPage Design System</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Estonian e-commerce theme built with Tailwind CSS 4.0, featuring OKLCH color space 
                and modern design tokens for optimal performance and accessibility.
            </p>
        </div>

        <!-- Color Palette -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Color Palette</h2>
            
            <!-- Estonian Brand Colors -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Estonian Brand Colors (OKLCH Format)</h3>
                <div class="grid grid-cols-2 md:grid-cols-5 lg:grid-cols-10 gap-4">
                    <?php 
                    $brand_colors = [
                        '50' => 'oklch(0.98 0.02 250)',
                        '100' => 'oklch(0.95 0.05 250)', 
                        '200' => 'oklch(0.90 0.10 250)',
                        '300' => 'oklch(0.82 0.15 250)',
                        '400' => 'oklch(0.70 0.18 250)',
                        '500' => 'oklch(0.55 0.20 250)',
                        '600' => 'oklch(0.45 0.22 250)',
                        '700' => 'oklch(0.35 0.20 250)',
                        '800' => 'oklch(0.25 0.15 250)',
                        '900' => 'oklch(0.15 0.10 250)'
                    ];
                    foreach ($brand_colors as $weight => $color): ?>
                        <div class="text-center">
                            <div class="w-full h-16 rounded-lg shadow-sm mb-2" style="background-color: <?php echo $color; ?>"></div>
                            <div class="text-sm font-medium text-gray-900">Brand <?php echo $weight; ?></div>
                            <div class="text-xs text-gray-500 font-mono"><?php echo $color; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Semantic Colors -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Success Colors -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Success Colors</h4>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg shadow-sm" style="background-color: oklch(0.95 0.05 140)"></div>
                            <div>
                                <div class="font-medium">Success 50</div>
                                <div class="text-sm text-gray-500 font-mono">oklch(0.95 0.05 140)</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg shadow-sm" style="background-color: oklch(0.50 0.18 140)"></div>
                            <div>
                                <div class="font-medium text-white">Success 600</div>
                                <div class="text-sm text-gray-500 font-mono">oklch(0.50 0.18 140)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Warning Colors -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Warning Colors</h4>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg shadow-sm" style="background-color: oklch(0.95 0.05 65)"></div>
                            <div>
                                <div class="font-medium">Warning 50</div>
                                <div class="text-sm text-gray-500 font-mono">oklch(0.95 0.05 65)</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg shadow-sm" style="background-color: oklch(0.60 0.18 65)"></div>
                            <div>
                                <div class="font-medium text-white">Warning 600</div>
                                <div class="text-sm text-gray-500 font-mono">oklch(0.60 0.18 65)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error Colors -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Error Colors</h4>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg shadow-sm" style="background-color: oklch(0.95 0.05 25)"></div>
                            <div>
                                <div class="font-medium">Error 50</div>
                                <div class="text-sm text-gray-500 font-mono">oklch(0.95 0.05 25)</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg shadow-sm" style="background-color: oklch(0.45 0.25 25)"></div>
                            <div>
                                <div class="font-medium text-white">Error 600</div>
                                <div class="text-sm text-gray-500 font-mono">oklch(0.45 0.25 25)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Typography -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Typography Scale</h2>
            <div class="space-y-6">
                <div>
                    <h1 class="mb-2">Heading 1 - Estonian Design Excellence</h1>
                    <code class="text-sm text-gray-500">font-size: var(--font-size-4xl) / lg: var(--font-size-6xl)</code>
                </div>
                <div>
                    <h2 class="mb-2">Heading 2 - Modern Typography</h2>
                    <code class="text-sm text-gray-500">font-size: var(--font-size-3xl) / lg: var(--font-size-4xl)</code>
                </div>
                <div>
                    <h3 class="mb-2">Heading 3 - Design System</h3>
                    <code class="text-sm text-gray-500">font-size: var(--font-size-2xl) / lg: var(--font-size-3xl)</code>
                </div>
                <div>
                    <h4 class="mb-2">Heading 4 - Component Library</h4>
                    <code class="text-sm text-gray-500">font-size: var(--font-size-xl)</code>
                </div>
                <div>
                    <h5 class="mb-2">Heading 5 - Tailwind CSS 4.0</h5>
                    <code class="text-sm text-gray-500">font-size: var(--font-size-lg)</code>
                </div>
                <div>
                    <h6 class="mb-2">Heading 6 - OKLCH Colors</h6>
                    <code class="text-sm text-gray-500">font-size: var(--font-size-base)</code>
                </div>
                <div>
                    <p class="mb-2">Body text with optimal line height for readability. This paragraph demonstrates the relaxed line spacing and professional typography that makes content easy to read across all devices.</p>
                    <code class="text-sm text-gray-500">font-size: var(--font-size-base), line-height: var(--line-height-relaxed)</code>
                </div>
                <div>
                    <a href="#" class="text-brand-600 hover:text-brand-700">Link with Estonian brand colors and hover effects</a><br>
                    <code class="text-sm text-gray-500">color: var(--color-brand-600), hover: var(--color-brand-700)</code>
                </div>
            </div>
        </section>

        <!-- Button Components -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Button Components</h2>
            
            <!-- Button Variants -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Button Variants</h3>
                <div class="flex flex-wrap gap-4">
                    <button class="btn btn-primary">Primary Button</button>
                    <button class="btn btn-secondary">Secondary Button</button>
                    <button class="btn btn-success">Success Button</button>
                    <button class="btn btn-outline">Outline Button</button>
                    <button class="btn btn-primary" disabled>Disabled Button</button>
                </div>
            </div>

            <!-- Button Sizes -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Button Sizes</h3>
                <div class="flex flex-wrap items-center gap-4">
                    <button class="btn btn-primary btn-sm">Small Button</button>
                    <button class="btn btn-primary">Default Button</button>
                    <button class="btn btn-primary btn-lg">Large Button</button>
                </div>
            </div>

            <!-- Button States -->
            <div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Button States (Hover & Focus)</h3>
                <div class="flex flex-wrap gap-4">
                    <button class="btn btn-primary">Hover over me</button>
                    <button class="btn btn-outline">Focus with Tab key</button>
                </div>
                <p class="text-sm text-gray-600 mt-2">Try hovering and using Tab key to see focus states with Estonian brand colors.</p>
            </div>
        </section>

        <!-- Card Components -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Card Components</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Basic Card -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Basic Card</h3>
                        <p class="text-gray-600">Simple card component with subtle shadow and rounded corners using design tokens.</p>
                    </div>
                </div>

                <!-- Hover Card -->
                <div class="card card-hover">
                    <div class="card-body">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Hover Card</h3>
                        <p class="text-gray-600">Hover over this card to see smooth elevation transition with Estonian design principles.</p>
                    </div>
                </div>

                <!-- Card with Header & Footer -->
                <div class="card">
                    <div class="card-header">
                        Card Header
                    </div>
                    <div class="card-body">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Complete Card</h3>
                        <p class="text-gray-600">Card with header and footer sections for structured content layout.</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm">Action</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Badges & Alerts -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Badges & Alerts</h2>
            
            <!-- Badges -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Badges</h3>
                <div class="flex flex-wrap gap-3">
                    <span class="badge badge-primary">Primary Badge</span>
                    <span class="badge badge-success">Success Badge</span>
                    <span class="badge badge-primary">New Feature</span>
                    <span class="badge badge-success">In Stock</span>
                </div>
            </div>

            <!-- Alerts -->
            <div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Alerts</h3>
                <div class="space-y-4">
                    <div class="alert alert-info">
                        <strong>Information:</strong> This design system is built with Tailwind CSS 4.0 and Estonian brand colors in OKLCH format.
                    </div>
                    <div class="alert alert-success">
                        <strong>Success:</strong> All components are using modern design tokens and accessibility best practices.
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Elements -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Form Elements</h2>
            
            <div class="max-w-md">
                <form class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" class="w-full">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="message" name="message" rows="4" placeholder="Your message here..." class="w-full"></textarea>
                    </div>
                    
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select id="category" name="category" class="w-full">
                            <option>General Inquiry</option>
                            <option>Technical Support</option>
                            <option>Sales Question</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
                
                <p class="text-sm text-gray-600 mt-4">Focus on form elements to see Estonian brand color focus states.</p>
            </div>
        </section>

        <!-- Icon Library -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Icon Library</h2>
            
            <!-- Stroke Width Info -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <h3 class="text-sm font-semibold text-blue-900 mb-2">Icon Consistency Guidelines</h3>
                <p class="text-sm text-blue-800"><strong>Stroke Width:</strong> All icons use <code class="bg-blue-100 px-1 rounded">stroke-width="1.5"</code> for consistency. Do not change this value to maintain visual harmony across the design system.</p>
            </div>
            
            <!-- Icon Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mb-8">
                <!-- Shopping Bag -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <div class="text-sm font-medium">Shopping</div>
                </div>
                
                <!-- User -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <div class="text-sm font-medium">User</div>
                </div>
                
                <!-- Search -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <div class="text-sm font-medium">Search</div>
                </div>
                
                <!-- Eye (View) -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <div class="text-sm font-medium">View</div>
                </div>
                
                <!-- Close -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-error-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    <div class="text-sm font-medium">Close</div>
                </div>
                
                <!-- Check -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-success-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    <div class="text-sm font-medium">Check</div>
                </div>
                
                <!-- Plus -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <div class="text-sm font-medium">Plus</div>
                </div>
                
                <!-- Ellipsis -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                    </svg>
                    <div class="text-sm font-medium">Menu</div>
                </div>
                
                <!-- Credit Card -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    <div class="text-sm font-medium">Payment</div>
                </div>
                
                <!-- Chevron Right -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                    <div class="text-sm font-medium">Next</div>
                </div>
                
                <!-- Chevron Double Right -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                    <div class="text-sm font-medium">Skip</div>
                </div>
                
                <!-- Chat Bubble -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                    <div class="text-sm font-medium">Chat</div>
                </div>
                
                <!-- Check Circle -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-success-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <div class="text-sm font-medium">Success</div>
                </div>
                
                <!-- Calendar -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <div class="text-sm font-medium">Calendar</div>
                </div>
                
                <!-- Bell -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-warning-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                    </svg>
                    <div class="text-sm font-medium">Notifications</div>
                </div>
                
                <!-- Expand -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                    </svg>
                    <div class="text-sm font-medium">Expand</div>
                </div>
                
                <!-- Adjustments -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                    <div class="text-sm font-medium">Settings</div>
                </div>
                
                <!-- Arrow Right -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                    <div class="text-sm font-medium">Continue</div>
                </div>
            </div>
            
            <!-- Icon Sizes Demo -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Icon Sizes</h3>
                <div class="flex items-center gap-6 flex-wrap">
                    <div class="flex items-center gap-2">
                        <svg class="icon icon-xs text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-sm font-medium">XS</span>
                        <code class="text-xs text-gray-500 bg-gray-100 px-1 rounded">.icon-xs</code>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <svg class="icon icon-sm text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-sm font-medium">SM</span>
                        <code class="text-xs text-gray-500 bg-gray-100 px-1 rounded">.icon-sm</code>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <svg class="icon text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a .375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-sm font-medium">Base</span>
                        <code class="text-xs text-gray-500 bg-gray-100 px-1 rounded">.icon</code>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <svg class="icon icon-lg text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-sm font-medium">LG</span>
                        <code class="text-xs text-gray-500 bg-gray-100 px-1 rounded">.icon-lg</code>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <svg class="icon icon-xl text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-sm font-medium">XL</span>
                        <code class="text-xs text-gray-500 bg-gray-100 px-1 rounded">.icon-xl</code>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <svg class="icon icon-2xl text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-sm font-medium text-brand-600">2XL</span>
                        <code class="text-xs text-brand-600 bg-brand-50 px-1 rounded">.icon-2xl</code>
                        <span class="text-xs text-brand-600 font-medium">(Grid size)</span>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <svg class="icon icon-3xl text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-sm font-medium">3XL</span>
                        <code class="text-xs text-gray-500 bg-gray-100 px-1 rounded">.icon-3xl</code>
                    </div>
                </div>
                
                <!-- Size Reference Table -->
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-900 mb-3">Size Reference</h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-xs">
                        <div><strong>.icon-xs:</strong> 12px (0.75rem)</div>
                        <div><strong>.icon-sm:</strong> 14px (0.875rem)</div>
                        <div><strong>.icon:</strong> 16px (1rem)</div>
                        <div><strong>.icon-lg:</strong> 20px (1.25rem)</div>
                        <div><strong>.icon-xl:</strong> 24px (1.5rem)</div>
                        <div class="text-brand-600 font-medium"><strong>.icon-2xl:</strong> 32px (2rem)</div>
                        <div><strong>.icon-3xl:</strong> 40px (2.5rem)</div>
                    </div>
                </div>
            </div>
            
            <!-- Icon Direction Demo -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Icon Directions (Rotation)</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-4">
                    <!-- Right (Default) -->
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <svg class="icon icon-xl mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <div class="text-sm font-medium">Right</div>
                        <code class="text-xs text-gray-500">Default</code>
                    </div>
                    
                    <!-- Down (90deg) -->
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <svg class="icon icon-xl icon-down mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <div class="text-sm font-medium">Down</div>
                        <code class="text-xs text-gray-500">.icon-down</code>
                    </div>
                    
                    <!-- Left (180deg) -->
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <svg class="icon icon-xl icon-left mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <div class="text-sm font-medium">Left</div>
                        <code class="text-xs text-gray-500">.icon-left</code>
                    </div>
                    
                    <!-- Up (270deg) -->
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <svg class="icon icon-xl icon-up mx-auto mb-2 text-brand-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <div class="text-sm font-medium">Up</div>
                        <code class="text-xs text-gray-500">.icon-up</code>
                    </div>
                </div>
                
                <!-- Rotation Utilities -->
                <div class="mb-4">
                    <h4 class="text-lg font-medium text-gray-900 mb-3">Available Rotation Classes</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h5 class="font-medium mb-2">Semantic Classes</h5>
                            <ul class="space-y-1 text-sm">
                                <li><code class="bg-white px-2 py-1 rounded">.icon-down</code> - 90° rotation</li>
                                <li><code class="bg-white px-2 py-1 rounded">.icon-left</code> - 180° rotation</li>
                                <li><code class="bg-white px-2 py-1 rounded">.icon-up</code> - 270° rotation</li>
                            </ul>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h5 class="font-medium mb-2">Rotation Utilities</h5>
                            <ul class="space-y-1 text-sm">
                                <li><code class="bg-white px-2 py-1 rounded">.icon-rotate-90</code> - 90° rotation</li>
                                <li><code class="bg-white px-2 py-1 rounded">.icon-rotate-180</code> - 180° rotation</li>
                                <li><code class="bg-white px-2 py-1 rounded">.icon-rotate-270</code> - 270° rotation</li>
                                <li><code class="bg-white px-2 py-1 rounded">.icon-animated</code> - smooth transitions</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Icon in Buttons Demo -->
            <div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Icons in Components</h3>
                <div class="flex flex-wrap gap-4">
                    <button class="btn btn-primary">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Add to Cart
                    </button>
                    
                    <button class="btn btn-success">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Confirm Order
                    </button>
                    
                    <button class="btn btn-outline">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        Search Products
                    </button>
                </div>
            </div>
        </section>

        <!-- WooCommerce Product Cards -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">WooCommerce Product Cards</h2>
            
            <!-- IMPORTANT CSS SOURCE OF TRUTH -->
            <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-8">
                <div class="flex items-start gap-3">
                    <svg class="icon icon-lg text-red-600 flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-red-800 mb-2">⚠️ CSS SOURCE OF TRUTH</h3>
                        <div class="text-red-700 space-y-2">
                            <p><strong>Product card CSS on defineeritud failis:</strong> <code class="bg-red-100 px-2 py-1 rounded font-mono text-sm">resources/css/app.css</code></p>
                            <p><strong>MITTE KUNAGI ära kopeeri product-card CSS-i teistesse failidesse!</strong></p>
                            <p>• Design system showcase ja WooCommerce pood kasutavad <strong>samu CSS klasse</strong></p>
                            <p>• Muudatused app.css failis rakenduvad automaatselt mõlemale</p>
                            <p>• woocommerce.css on ainult WooCommerce-spetsiifiliste fixide jaoks</p>
                            <p>• Product card juba sisaldab: 1:1 aspect ratio, object-cover, hover effects</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product Card Variants -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Product Card Variants</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- Standard Product Card -->
                    <div class="group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 flex flex-col h-full hover:shadow-xl hover:-translate-y-0.5">
                        <div class="relative aspect-square overflow-hidden">
                            <a href="#" class="block w-full h-full no-underline">
                                <img src="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp" alt="Demo Product" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                            </a>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="text-base font-semibold text-gray-900 mb-2 leading-tight line-clamp-2">
                                <a href="#" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600">Standard Product Name</a>
                            </h3>
                            <div class="flex items-center justify-between mb-3 gap-2">
                                <div class="text-lg font-bold text-gray-900">
                                    <span>29.99 €</span>
                                </div>
                                <div class="flex items-center gap-1 text-warning-500 text-sm">
                                    <div class="flex gap-px">
                                        <span class="text-warning-500">★★★★☆</span>
                                    </div>
                                    <span class="text-gray-500 text-xs ml-1">(23)</span>
                                </div>
                            </div>
                            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2 transition-colors duration-150 hover:border-brand-400 relative">
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Lisa ostukorvi">
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="action-text">Lisa korvi</span>
                                </a>
                                <div class="w-px h-8 bg-gray-300 mx-1 flex-shrink-0 transition-colors duration-150 hover:bg-brand-400"></div>
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Vaata toodet">
                                    <span class="action-text">Vaata toodet</span>
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Card with Sale Badge -->
                    <div class="group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 flex flex-col h-full hover:shadow-xl hover:-translate-y-0.5">
                        <div class="relative aspect-square overflow-hidden">
                            <a href="#" class="block w-full h-full no-underline">
                                <img src="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp" alt="Sale Product" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                            </a>
                            <span class="absolute top-2 left-2 z-10 text-xs font-semibold px-2 py-1 rounded-full uppercase tracking-wide bg-red-500 text-white">
                                -25%
                            </span>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="text-base font-semibold text-gray-900 mb-2 leading-tight line-clamp-2">
                                <a href="#" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600">Sale Product with Long Name That Wraps</a>
                            </h3>
                            <div class="flex items-center justify-between mb-3 gap-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg font-bold text-red-600">19.99 €</span>
                                    <span class="text-sm font-normal text-gray-500 line-through">39.99 €</span>
                                </div>
                                <div class="flex items-center gap-1 text-warning-500 text-sm">
                                    <div class="flex gap-px">
                                        <span class="text-warning-500">★★★★★</span>
                                    </div>
                                    <span class="text-gray-500 text-xs ml-1">(89)</span>
                                </div>
                            </div>
                            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2 transition-colors duration-150  relative">
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Lisa ostukorvi">
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="action-text">Lisa korvi</span>
                                </a>
                                <div class="w-px h-8 bg-gray-300 mx-1 flex-shrink-0 transition-colors duration-150 hover:bg-brand-400"></div>
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Vaata toodet">
                                    <span class="action-text">Vaata toodet</span>
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Featured Product Card -->
                    <div class="group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 flex flex-col h-full hover:shadow-xl hover:-translate-y-0.5">
                        <div class="relative aspect-square overflow-hidden">
                            <a href="#" class="block w-full h-full no-underline">
                                <img src="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp" alt="Featured Product" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                            </a>
                            <span class="absolute top-2 left-2 z-10 text-xs font-semibold px-2 py-1 rounded-full uppercase tracking-wide bg-brand-500 text-white">
                                Soovitatud
                            </span>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="text-base font-semibold text-gray-900 mb-2 leading-tight line-clamp-2">
                                <a href="#" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600">Featured Product</a>
                            </h3>
                            <div class="flex items-center justify-between mb-3 gap-2">
                                <div class="text-lg font-bold text-gray-900">
                                    <span>49.99 €</span>
                                </div>
                                <div class="flex items-center gap-1 text-warning-500 text-sm">
                                    <div class="flex gap-px">
                                        <span class="text-warning-500">★★★★☆</span>
                                    </div>
                                    <span class="text-gray-500 text-xs ml-1">(156)</span>
                                </div>
                            </div>
                            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2 transition-colors duration-150  relative">
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Lisa ostukorvi">
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="action-text">Lisa korvi</span>
                                </a>
                                <div class="w-px h-8 bg-gray-300 mx-1 flex-shrink-0 transition-colors duration-150 hover:bg-brand-400"></div>
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Vaata toodet">
                                    <span class="action-text">Vaata toodet</span>
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product without Image -->
                    <div class="group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 flex flex-col h-full hover:shadow-xl hover:-translate-y-0.5">
                        <div class="relative aspect-square overflow-hidden">
                            <a href="#" class="block w-full h-full no-underline">
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                                    <span>Pilt puudub</span>
                                </div>
                            </a>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="text-base font-semibold text-gray-900 mb-2 leading-tight line-clamp-2">
                                <a href="#" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600">Product Without Image</a>
                            </h3>
                            <div class="flex items-center justify-between mb-3 gap-2">
                                <div class="text-lg font-bold text-gray-900">
                                    <span>15.99 €</span>
                                </div>
                            </div>
                            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2 transition-colors duration-150  relative">
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Lisa ostukorvi">
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="action-text">Lisa korvi</span>
                                </a>
                                <div class="w-px h-8 bg-gray-300 mx-1 flex-shrink-0 transition-colors duration-150 hover:bg-brand-400"></div>
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Vaata toodet">
                                    <span class="action-text">Vaata toodet</span>
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Out of Stock Product -->
                    <div class="group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 flex flex-col h-full hover:shadow-xl hover:-translate-y-0.5">
                        <div class="relative aspect-square overflow-hidden">
                            <a href="#" class="block w-full h-full no-underline">
                                <img src="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp" alt="Out of Stock" class="w-full h-full object-cover opacity-60" />
                            </a>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="text-base font-semibold text-gray-900 mb-2 leading-tight line-clamp-2">
                                <a href="#" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600">Out of Stock Product</a>
                            </h3>
                            <div class="flex items-center justify-between mb-3 gap-2">
                                <div class="text-lg font-bold text-gray-900">
                                    <span>25.99 €</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="text-yellow-400 text-sm">
                                        <span>★★★☆☆</span>
                                    </div>
                                    <span class="text-xs text-gray-500">(7)</span>
                                </div>
                            </div>
                            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2">
                                <span class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-gray-400 text-white cursor-not-allowed text-xs font-medium uppercase rounded">
                                    <svg class="w-6 h-6 stroke-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                    Pole saadaval
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Compact Variant -->
                    <div class="group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 flex flex-col h-full hover:shadow-xl hover:-translate-y-0.5">
                        <div class="relative aspect-square overflow-hidden">
                            <a href="#" class="block w-full h-full no-underline">
                                <img src="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp" alt="Compact Product" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                            </a>
                            <span class="absolute top-2 left-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                                Uus
                            </span>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="text-base font-semibold text-gray-900 mb-2 leading-tight line-clamp-2">
                                <a href="#" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600">Compact Card</a>
                            </h3>
                            <div class="flex items-center justify-between mb-3 gap-2">
                                <div class="text-lg font-bold text-gray-900">
                                    <span>12.99 €</span>
                                </div>
                            </div>
                            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2 transition-colors duration-150  relative">
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Lisa ostukorvi">
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="action-text">Lisa korvi</span>
                                </a>
                                <div class="w-px h-8 bg-gray-300 mx-1 flex-shrink-0 transition-colors duration-150 hover:bg-brand-400"></div>
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Vaata toodet">
                                    <span class="action-text">Vaata toodet</span>
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!-- Wide Product Card -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Wide Product Card Variant</h3>
                <div class="max-w-2xl">
                    <div class="group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 flex flex-row h-full hover:shadow-xl hover:-translate-y-0.5">
                        <div class="relative w-48 flex-shrink-0 overflow-hidden">
                            <a href="#" class="block w-full h-full no-underline">
                                <img src="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp" alt="Wide Product" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" style="background-color: #fef3c7;" />
                            </a>
                            <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                                -30%
                            </span>
                        </div>
                        <div class="p-4 flex flex-col flex-1 justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 leading-tight line-clamp-2">
                                    <a href="#" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600">Wide Layout Product Card for Lists</a>
                                </h3>
                                <div class="flex items-center justify-between mb-4 gap-4">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl font-bold text-red-600">69.99 €</span>
                                        <span class="text-sm text-gray-500 line-through">99.99 €</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <div class="text-yellow-400 text-base">
                                            <span>★★★★★</span>
                                        </div>
                                        <span class="text-sm text-gray-500">(234)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center gap-0 border-t border-gray-200 pt-3 transition-colors duration-150  relative">
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-sm font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Lisa ostukorvi">
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="action-text">Lisa korvi</span>
                                </a>
                                <div class="w-px h-8 bg-gray-300 mx-1 flex-shrink-0 transition-colors duration-150 hover:bg-brand-400"></div>
                                <a href="#" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-sm font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Vaata toodet">
                                    <span class="action-text">Vaata toodet</span>
                                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Component Reference -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Card Components</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                    <div>
                        <h4 class="font-medium mb-2">Base Classes</h4>
                        <ul class="space-y-1">
                            <li><code class="bg-white px-2 py-1 rounded">.product-card</code> - Main container</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__image</code> - Image section</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__content</code> - Content wrapper</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__title</code> - Product title</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__meta</code> - Price + rating row</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__actions</code> - Button area</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-medium mb-2">Variants & Modifiers</h4>
                        <ul class="space-y-1">
                            <li><code class="bg-white px-2 py-1 rounded">.product-card--compact</code> - Narrow version</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card--wide</code> - Horizontal layout</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__badge--sale</code> - Sale badge</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__badge--featured</code> - Featured badge</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__badge--new</code> - New badge</li>
                            <li><code class="bg-white px-2 py-1 rounded">.product-card__price--on-sale</code> - Sale pricing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Detail Page Layout -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Product Detail Page Layout</h2>
            <p class="text-gray-600 mb-8">Complete product detail page layout with image gallery, product information, and purchase form using Tailwind CSS and Alpine.js. This is a 1:1 demo of the WooCommerce single product page layout.</p>
            
            <!-- Main Product Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-4 lg:p-8">
                    
                    <!-- Images container: Complete Gallery Implementation -->
                    <div class="gallery-container">
                        <div
                            x-data="{ 
                                active: 0, 
                                displayImages: [
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp',
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_6-600x600.webp',
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_5-600x600.webp',
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_4-600x600.webp',
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_mood_1-600x400.webp'
                                ],
                                lightboxImages: [
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3.webp',
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_6.webp',
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_5.webp',
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_4.webp',
                                    'http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_mood_1.webp'
                                ],
                                topOpacity: 0, 
                                bottomOpacity: 0,
                                leftOpacity: 0,
                                rightOpacity: 0,
                                fadeDistance: 80,
                                imageLoaded: true
                            }"
                            class="flex flex-col lg:flex-row gap-4"
                        >
                            <!-- THUMBS - First on desktop (left side), second on mobile (below) -->
                            <div class="relative w-full lg:w-24 flex-shrink-0 order-2 lg:order-1">
                                <div 
                                    class="flex lg:flex-col gap-4 overflow-x-auto lg:overflow-y-auto lg:overflow-x-visible lg:h-full p-1 lg:max-h-[464px] scrollbar-hide"
                                    x-ref="scrollContainer"
                                    @wheel="
                                        const el = $refs.scrollContainer;
                                        // Only handle horizontal scroll on smaller screens
                                        if (window.innerWidth < 1024) {
                                            $event.preventDefault();
                                            // Smooth scroll by reducing the increment
                                            el.scrollLeft += $event.deltaY * 0.5;
                                        }
                                        // On desktop, let normal vertical scroll work (no preventDefault)
                                    "
                                    @scroll="
                                        const el = $refs.scrollContainer;
                                        const fade = fadeDistance;
                                        
                                        // Desktop: vertical scroll gradients
                                        if (window.innerWidth >= 1024) {
                                            topOpacity = Math.min(el.scrollTop / fade, 1);
                                            const scrollBottom = el.scrollTop + el.clientHeight;
                                            const distanceFromBottom = el.scrollHeight - scrollBottom;
                                            bottomOpacity = el.scrollHeight > el.clientHeight ? Math.min(distanceFromBottom / fade, 1) : 0;
                                            leftOpacity = 0;
                                            rightOpacity = 0;
                                        } 
                                        // Mobile: horizontal scroll gradients
                                        else {
                                            leftOpacity = Math.min(el.scrollLeft / fade, 1);
                                            const scrollRight = el.scrollLeft + el.clientWidth;
                                            const distanceFromRight = el.scrollWidth - scrollRight;
                                            rightOpacity = el.scrollWidth > el.clientWidth ? Math.min(distanceFromRight / fade, 1) : 0;
                                            topOpacity = 0;
                                            bottomOpacity = 0;
                                        }
                                    "
                                    x-init="
                                        $nextTick(() => {
                                            const el = $refs.scrollContainer;
                                            if (window.innerWidth >= 1024) {
                                                // Desktop: vertical gradients
                                                topOpacity = 0;
                                                bottomOpacity = el.scrollHeight > el.clientHeight ? 1 : 0;
                                                leftOpacity = 0;
                                                rightOpacity = 0;
                                            } else {
                                                // Mobile: horizontal gradients
                                                leftOpacity = 0;
                                                rightOpacity = el.scrollWidth > el.clientWidth ? 1 : 0;
                                                topOpacity = 0;
                                                bottomOpacity = 0;
                                            }
                                        });
                                    "
                                >
                                    <template x-for="(image, index) in displayImages" :key="index">
                                        <button
                                            @click="
                                                imageLoaded = false; 
                                                setTimeout(() => { 
                                                    active = index; 
                                                    imageLoaded = true; 
                                                }, 150);
                                            "
                                            :class="{'shadow-xl scale-105': active === index }"
                                            class="aspect-square w-24 lg:w-full flex-shrink-0 rounded overflow-hidden focus:outline-none transform transition-all duration-300 cursor-pointer"
                                        >
                                            <img :src="image" class="w-full h-full object-cover" />
                                        </button>
                                    </template>
                                    
                                    <!-- Vertical gradients (desktop only) -->
                                    <!-- Top gradient -->
                                    <div 
                                        x-show="topOpacity > 0" 
                                        :style="{ opacity: topOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute top-0 left-0 right-0 h-8 bg-gradient-to-b from-white via-white/70 to-transparent pointer-events-none hidden lg:block z-10"
                                    ></div>
                                    
                                    <!-- Bottom gradient -->
                                    <div 
                                        x-show="bottomOpacity > 0" 
                                        :style="{ opacity: bottomOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-white via-white/70 to-transparent pointer-events-none hidden lg:block z-10"
                                    ></div>
                                    
                                    <!-- Horizontal gradients (mobile only) -->
                                    <!-- Left gradient -->
                                    <div 
                                        x-show="leftOpacity > 0" 
                                        :style="{ opacity: leftOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute top-0 bottom-0 left-0 w-8 bg-gradient-to-r from-white via-white/70 to-transparent pointer-events-none block lg:hidden z-10"
                                    ></div>
                                    
                                    <!-- Right gradient -->
                                    <div 
                                        x-show="rightOpacity > 0" 
                                        :style="{ opacity: rightOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute top-0 bottom-0 right-0 w-8 bg-gradient-to-l from-white via-white/70 to-transparent pointer-events-none block lg:hidden z-10"
                                    ></div>
                                </div>
                            </div>

                            <!-- MAIN IMAGE (1:1) - First on mobile, second on desktop -->
                            <div class="relative flex-1 aspect-square order-1 lg:order-2">
                                <!-- Fancybox Gallery - Main Visible Image -->
                                <a
                                    href="#"
                                    @click.prevent="document.querySelectorAll('[data-fancybox=product-gallery-demo]')[active].click()"
                                    class="block w-full h-full rounded-lg overflow-hidden bg-gray-50 border border-gray-200 transition-all duration-500 ease-out cursor-pointer"
                                    :class="imageLoaded ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
                                >
                                    <img
                                        :src="displayImages[active]"
                                        alt="Product image"
                                        class="w-full h-full object-contain"
                                        loading="lazy"
                                        @load="imageLoaded = true"
                                    >

                                    <!-- Zoom/Lightbox-trigger -->
                                    <span class="absolute top-2 right-2 p-1 bg-white/80 rounded-full shadow cursor-zoom-in" aria-label="Open image gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                        </svg>
                                    </span>
                                </a>
                                
                                <!-- Hidden Gallery Links for Fancybox Navigation -->
                                <div class="hidden">
                                    <a
                                        href="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3.webp"
                                        data-fancybox="product-gallery-demo"
                                        data-index="0"
                                        data-caption="Product detail view - Main"
                                    ></a>
                                    <a
                                        href="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_6.webp"
                                        data-fancybox="product-gallery-demo"
                                        data-index="1"
                                        data-caption="Product detail view - Side angle"
                                    ></a>
                                    <a
                                        href="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_5.webp"
                                        data-fancybox="product-gallery-demo"
                                        data-index="2"
                                        data-caption="Product detail view - Close-up"
                                    ></a>
                                    <a
                                        href="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_4.webp"
                                        data-fancybox="product-gallery-demo"
                                        data-index="3"
                                        data-caption="Product detail view - Extended"
                                    ></a>
                                    <a
                                        href="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_mood_1.webp"
                                        data-fancybox="product-gallery-demo"
                                        data-index="4"
                                        data-caption="Product lifestyle view"
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details - Right Side -->
                    <div class="order-2 space-y-3">
                        
                        <!-- 1. Product Title with Brand Logo -->
                        <div class="flex items-start justify-between gap-4 mb-1">
                            <h1 class="text-xl font-bold text-gray-900 flex-1 mb-0">Pikendatav Söögilaud Strada Valge ilus laud- Pikendatav Söögilaud Strada Valge</h1>
                            
                            <!-- Sample Brand Logo -->
                            <div class="flex-shrink-0">
                                <img src="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp" 
                                     alt="Brand logo" 
                                     class="max-h-16 max-w-[150px] w-auto object-contain transition-opacity duration-200 hover:opacity-80"
                                     style="max-height: 64px; max-width: 150px;">
                            </div>
                        </div>
                        
                        <!-- 2. Rating -->
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-sm text-gray-600 ml-2">4.2</span>
                            </div>
                            <span class="text-sm text-gray-500">(18 hinnangut)</span>
                        </div>
                        
                        <!-- 3. Short Description -->
                        <div>
                            <p class="text-gray-600 text-sm leading-tight">Kaasaegne ja funktsionaalne pikendatav söögilaud, mis sobib ideaalselt nii igapäevaseks kasutamiseks kui ka külaliste vastuvõtmiseks.</p>
                        </div>

                        <!-- 4. Price -->
                        <div>
                            <div class="flex items-baseline space-x-3">
                                <span class="text-sm text-gray-400 line-through">899,99 €</span>
                                <span class="text-3xl font-bold text-green-600">699,99 €</span>
                            </div>
                        </div>
                        
                        <!-- 5. Tarneaeg + Saadavus Row -->
                        <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-6">
                            <div class="flex items-center space-x-2 text-sm">
                                <span class="font-semibold text-gray-700">Tarneaeg:</span>
                                <span class="text-gray-600">2 - 5 tööpäeva</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm">
                                <span class="font-semibold text-gray-700">Saadavus:</span>
                                <span class="text-green-600 font-bold">Saadaval</span>
                                <span class="text-gray-500">|</span> 
                                <span class="text-gray-600 font-semibold">5+tk laos</span>
                            </div>
                        </div>
                        
                        <!-- Add to Cart Form -->
                        <form class="cart space-y-4">
                            <div class="border-t border-gray-200 pt-0"></div>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <div class="flex items-center space-x-3">
                                    <label class="text-sm font-semibold text-gray-700">Kogus:</label>
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button type="button" class="px-2 py-2 text-gray-600 hover:text-gray-800 cursor-pointer">−</button>
                                        <input type="number" value="1" min="1" class="w-12 text-center border-0 focus:ring-0">
                                        <button type="button" class="px-2 py-2 text-gray-600 hover:text-gray-800 cursor-pointer">+</button>
                                    </div>
                                </div>
                                <div class="flex gap-3 flex-1">
                                    <button type="submit" class="flex-1 flex items-center justify-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        Lisa korvi
                                    </button>
                                    <button type="button" class="flex-1 flex items-center justify-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                        </svg>
                                        Osta kohe
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Meta Info -->
                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center space-x-2">
                                    <span class="font-semibold text-gray-700">Bränd:</span>
                                    <span class="text-gray-600">Demo Brand</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="font-semibold text-gray-700">Tootekood:</span>
                                    <span class="text-gray-600">DEMO-12345</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center space-x-2">
                                    <span class="font-semibold text-gray-700">Kategooriad:</span>
                                    <span class="text-gray-600">Mööbel, Söögilauad</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="font-semibold text-gray-700">EAN:</span>
                                    <span class="text-gray-600">1234567890123</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Fancybox Initialization Script for Product Detail Page Demo -->
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Fancybox with custom options for demo gallery
                Fancybox.bind('[data-fancybox="product-gallery-demo"]', {
                    infinite: true,
                    keyboard: true,
                    wheel: false,
                    touch: {
                        vertical: true,
                        momentum: true
                    },
                    buttons: [
                        "zoom",
                        "slideShow", 
                        "fullScreen",
                        "download",
                        "thumbs",
                        "close"
                    ],
                    Toolbar: {
                        display: {
                            left: ["infobar"],
                            middle: [
                                "zoomIn",
                                "zoomOut", 
                                "toggle1to1",
                                "rotateCCW",
                                "rotateCW",
                                "flipX",
                                "flipY"
                            ],
                            right: ["slideshow", "thumbs", "close"]
                        }
                    }
                });
            });
            </script>
        </section>

        <!-- Design Tokens -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Design Tokens</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Spacing -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Spacing Scale</h3>
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-brand-200"></div>
                            <span class="text-sm">--spacing-4 (1rem)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-4 bg-brand-200"></div>
                            <span class="text-sm">--spacing-6 (1.5rem)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-4 bg-brand-200"></div>
                            <span class="text-sm">--spacing-8 (2rem)</span>
                        </div>
                    </div>
                </div>

                <!-- Border Radius -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Border Radius</h3>
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-brand-200" style="border-radius: var(--radius-sm)"></div>
                            <span class="text-sm">--radius-sm</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-brand-200" style="border-radius: var(--radius-md)"></div>
                            <span class="text-sm">--radius-md</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-brand-200" style="border-radius: var(--radius-lg)"></div>
                            <span class="text-sm">--radius-lg</span>
                        </div>
                    </div>
                </div>

                <!-- Shadows -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Shadow System</h3>
                    <div class="space-y-3">
                        <div class="w-16 h-8 bg-white" style="box-shadow: var(--shadow-sm)">
                            <span class="text-xs">sm</span>
                        </div>
                        <div class="w-16 h-8 bg-white" style="box-shadow: var(--shadow-base)">
                            <span class="text-xs">base</span>
                        </div>
                        <div class="w-16 h-8 bg-white" style="box-shadow: var(--shadow-md)">
                            <span class="text-xs">md</span>
                        </div>
                    </div>
                </div>

                <!-- Typography -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Font Families</h3>
                    <div class="space-y-2">
                        <div style="font-family: var(--font-display)">
                            <span class="text-sm">Display: Inter</span>
                        </div>
                        <div style="font-family: var(--font-body)">
                            <span class="text-sm">Body: Inter</span>
                        </div>
                        <div style="font-family: var(--font-mono)">
                            <span class="text-sm">Mono: JetBrains</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center py-8 border-t border-gray-200">
            <p class="text-gray-600">
                <strong>BlankPage Design System</strong> - Estonian e-commerce theme built with 
                <strong>Tailwind CSS 4.0</strong> and <strong>OKLCH color space</strong>
            </p>
            <p class="text-sm text-gray-500 mt-2">
                All components use modern design tokens for consistency, accessibility, and performance.
            </p>
        </footer>

    </div>
</main>

<?php get_footer(); ?>
