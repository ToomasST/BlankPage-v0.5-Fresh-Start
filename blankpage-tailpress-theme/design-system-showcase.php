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

        <!-- Quick Reference Guide -->
        <section class="mb-16 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6 flex items-center">
                <span class="bg-blue-100 text-blue-600 rounded-full p-2 mr-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                Quick Reference - Tailwind CSS 4.0+ Guidelines
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Core Principles -->
                <div class="bg-blue-50 rounded-lg p-4">
                    <h3 class="font-semibold text-blue-900 mb-3">✅ Core Principles</h3>
                    <ul class="text-sm text-blue-800 space-y-1">
                        <li>• <strong>Inline utilities FIRST</strong> - Use utility classes directly in HTML</li>
                        <li>• <strong>Avoid @apply</strong> - Components use inline classes only</li>
                        <li>• <strong>OKLCH colors</strong> - Modern color space for Estonian brand</li>
                        <li>• <strong>Dynamic utilities</strong> - Any spacing/grid value works</li>
                    </ul>
                </div>

                <!-- Phantom Classes Warning -->
                <div class="bg-red-50 rounded-lg p-4">
                    <h3 class="font-semibold text-red-900 mb-3">⚠️ Phantom Classes</h3>
                    <ul class="text-sm text-red-800 space-y-1">
                        <li>• <code class="bg-red-100 px-1 rounded">.btn</code>, <code class="bg-red-100 px-1 rounded">.card</code>, <code class="bg-red-100 px-1 rounded">.badge</code> - DON'T EXIST</li>
                        <li>• <code class="bg-red-100 px-1 rounded">.alert</code>, <code class="bg-red-100 px-1 rounded">.modal</code> - NOT DEFINED</li>
                        <li>• Use: <code class="bg-green-100 px-1 rounded">bg-blue-600 px-4 py-2</code></li>
                        <li>• Never: <code class="bg-red-100 px-1 rounded">@apply .btn-primary</code></li>
                    </ul>
                </div>

                <!-- Dynamic Utilities -->
                <div class="bg-green-50 rounded-lg p-4">
                    <h3 class="font-semibold text-green-900 mb-3">🚀 Dynamic Utilities</h3>
                    <ul class="text-sm text-green-800 space-y-1">
                        <li>• <code class="bg-green-100 px-1 rounded">grid-cols-15</code> - Any number works</li>
                        <li>• <code class="bg-green-100 px-1 rounded">mt-17 w-29</code> - Custom spacing</li>
                        <li>• <code class="bg-green-100 px-1 rounded">data-current:opacity-100</code> - Custom states</li>
                        <li>• <code class="bg-green-100 px-1 rounded">@sm:grid-cols-3</code> - Container queries</li>
                    </ul>
                </div>

                <!-- Performance -->
                <div class="bg-purple-50 rounded-lg p-4">
                    <h3 class="font-semibold text-purple-900 mb-3">⚡ Performance</h3>
                    <ul class="text-sm text-purple-800 space-y-1">
                        <li>• <strong>3.5x faster</strong> full rebuilds</li>
                        <li>• <strong>8x faster</strong> incremental builds</li>
                        <li>• <strong>100x faster</strong> cache hits</li>
                        <li>• Native CSS features built-in</li>
                    </ul>
                </div>

                <!-- Estonian Brand -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="font-semibold text-gray-900 mb-3">🇪🇪 Estonian Brand</h3>
                    <ul class="text-sm text-gray-800 space-y-1">
                        <li>• <code class="bg-gray-100 px-1 rounded">bg-[oklch(0.5_0.2_240)]</code> - Primary blue</li>
                        <li>• <code class="bg-gray-100 px-1 rounded">text-[oklch(0.2_0_0)]</code> - Dark text</li>
                        <li>• Modern color space for accessibility</li>
                        <li>• Future-proof color definitions</li>
                    </ul>
                </div>

                <!-- Common Patterns -->
                <div class="bg-yellow-50 rounded-lg p-4">
                    <h3 class="font-semibold text-yellow-900 mb-3">🎯 Common Patterns</h3>
                    <ul class="text-sm text-yellow-800 space-y-1">
                        <li>• <strong>Button:</strong> <code class="bg-yellow-100 px-1 rounded">bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg</code></li>
                        <li>• <strong>Card:</strong> <code class="bg-yellow-100 px-1 rounded">bg-white rounded-lg shadow-sm border p-6</code></li>
                        <li>• <strong>Badge:</strong> <code class="bg-yellow-100 px-1 rounded">bg-gray-100 text-gray-800 px-2 py-1 rounded-full</code></li>
                        <li>• <strong>Alert:</strong> <code class="bg-yellow-100 px-1 rounded">bg-blue-50 border-l-4 border-blue-400 p-4</code></li>
                    </ul>
                </div>
            </div>

            <div class="mt-6 p-4 bg-gray-100 rounded-lg">
                <p class="text-sm text-gray-700">
                    <strong>📚 Documentation:</strong> All components in this showcase use Tailwind CSS 4.0+ inline utilities. 
                    No component classes (.btn, .card) are defined. Use this reference when building new components.
                    <strong>Performance:</strong> Oxide engine provides microsecond cache hits and native CSS features.
                </p>
            </div>
        </section>

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

        <!-- Design Tokens -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Design Tokens</h2>
            
            <!-- Spacing -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Spacing</h3>
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div class="bg-blue-500 h-2 mb-2 rounded"></div>
                            <div class="text-sm font-medium">xs (0.5rem)</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-500 h-4 mb-2 rounded"></div>
                            <div class="text-sm font-medium">sm (1rem)</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-500 h-6 mb-2 rounded"></div>
                            <div class="text-sm font-medium">md (1.5rem)</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-500 h-8 mb-2 rounded"></div>
                            <div class="text-sm font-medium">lg (2rem)</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Border Radius -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Border Radius</h3>
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div class="bg-blue-500 h-12 w-12 mx-auto mb-2 rounded-none"></div>
                            <div class="text-sm font-medium">none</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-500 h-12 w-12 mx-auto mb-2 rounded-sm"></div>
                            <div class="text-sm font-medium">sm</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-500 h-12 w-12 mx-auto mb-2 rounded-md"></div>
                            <div class="text-sm font-medium">md</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-500 h-12 w-12 mx-auto mb-2 rounded-lg"></div>
                            <div class="text-sm font-medium">lg</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Font Families -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Font Families</h3>
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="space-y-4">
                        <div style="font-family: var(--font-sans)">
                            <span class="text-lg">Sans: Inter Regular - The quick brown fox jumps over the lazy dog</span>
                        </div>
                        <div style="font-family: var(--font-serif)">
                            <span class="text-lg">Serif: Times New Roman - The quick brown fox jumps over the lazy dog</span>
                        </div>
                        <div style="font-family: var(--font-mono)">
                            <span class="text-sm">Mono: JetBrains</span>                            
                        </div>
                        
                        
                    </div>
                </div>
                
                <!-- Code Example -->
                <div class="mt-6 bg-gray-900 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2">HTML + Alpine.js kood:</h4>
                    <pre class="text-green-400 text-sm overflow-x-auto"><code>&lt;div x-data="{ activeTab: 'description' }"&gt;
  &lt;button @click="activeTab = 'description'"&gt;Kirjeldus&lt;/button&gt;
  &lt;div x-show="activeTab === 'description'"&gt;...&lt;/div&gt;
&lt;/div&gt;</code></pre>
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
            
            <!-- Text Size Utility Classes -->
            <div class="mt-12">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Text Size Utility Classes</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <span class="text-2xs text-gray-900">The quick brown fox jumps over the lazy dog</span>
                        <code class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">.text-2xs</code>
                        <span class="text-xs text-gray-400">0.625rem (10px)</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-xs text-gray-900">The quick brown fox jumps over the lazy dog</span>
                        <code class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">.text-xs</code>
                        <span class="text-xs text-gray-400">0.75rem (12px)</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-gray-900">The quick brown fox jumps over the lazy dog</span>
                        <code class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">.text-sm</code>
                        <span class="text-xs text-gray-400">0.875rem (14px)</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-base text-gray-900">The quick brown fox jumps over the lazy dog</span>
                        <code class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">.text-base</code>
                        <span class="text-xs text-gray-400">1rem (16px)</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-lg text-gray-900">The quick brown fox jumps over the lazy dog</span>
                        <code class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">.text-lg</code>
                        <span class="text-xs text-gray-400">1.125rem (18px)</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-xl text-gray-900">The quick brown fox jumps over the lazy dog</span>
                        <code class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">.text-xl</code>
                        <span class="text-xs text-gray-400">1.25rem (20px)</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-2xl text-gray-900">The quick brown fox jumps</span>
                        <code class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">.text-2xl</code>
                        <span class="text-xs text-gray-400">1.5rem (24px)</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-3xl text-gray-900">The quick brown fox</span>
                        <code class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">.text-3xl</code>
                        <span class="text-xs text-gray-400">1.875rem (30px)</span>
                    </div>
                </div>
                
                <!-- Note about smallest size -->
                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <p class="text-sm text-blue-800">
                        <strong>Note:</strong> <code class="bg-blue-100 px-1 rounded">text-xs</code> is the smallest predefined text size in our design system. 
                        For smaller text, use Tailwind 4.0 arbitrary values like <code class="bg-blue-100 px-1 rounded">text-[10px]</code> sparingly.
                    </p>
                </div>
            </div>
        </section>

        <!-- Button Components -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Button Components</h2>
            
            <!-- FIXED: Using Tailwind 4.0+ inline utilities instead of non-existent component classes -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <p class="text-green-700 text-sm">
                    ✅ <strong>Tailwind 4.0+ Approach:</strong> Using inline utilities instead of @apply component classes.
                    All buttons below use actual Tailwind classes that exist and work.
                </p>
            </div>
            
            <!-- Button Variants -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Button Variants</h3>
                <div class="flex flex-wrap gap-4">
                    <!-- Primary Button - Estonian brand gradient -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Primary Button
                    </button>
                    
                    <!-- Secondary Button -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Secondary Button
                    </button>
                    
                    <!-- Success Button -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-green-600 to-emerald-600 rounded-md shadow-sm hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200">
                        Success Button
                    </button>
                    
                    <!-- Warning Button -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-orange-500 rounded-md shadow-sm hover:from-amber-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all duration-200">
                        Warning Button
                    </button>
                    
                    <!-- Error Button -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-red-600 to-red-700 rounded-md shadow-sm hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200">
                        Error Button
                    </button>
                    
                    <!-- Outline Button -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-600 bg-transparent border-2 border-blue-600 rounded-md hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Outline Button
                    </button>
                    
                    <!-- Disabled Button -->
                    <button disabled class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-md cursor-not-allowed opacity-60">
                        Disabled Button
                    </button>
                </div>
            </div>

            <!-- Button Sizes -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Button Sizes</h3>
                <div class="flex flex-wrap items-center gap-4">
                    <!-- Small Button -->
                    <button class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Small Button
                    </button>
                    
                    <!-- Default Button -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Default Button
                    </button>
                    
                    <!-- Large Button -->
                    <button class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Large Button
                    </button>
                    
                    <!-- Extra Large Button -->
                    <button class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Extra Large
                    </button>
                </div>
            </div>

            <!-- Button with Icons -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Buttons with Icons</h3>
                <div class="flex flex-wrap gap-4">
                    <!-- Icon Left -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Add to Cart
                    </button>
                    
                    <!-- Icon Right -->
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-green-600 to-emerald-600 rounded-md shadow-sm hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200">
                        Continue
                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                    
                    <!-- Icon Only -->
                    <button class="inline-flex items-center justify-center w-10 h-10 text-gray-600 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Button States -->
            <div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Button States (Hover & Focus)</h3>
                <div class="flex flex-wrap gap-4">
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Hover over me
                    </button>
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-600 bg-transparent border-2 border-blue-600 rounded-md hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Focus with Tab key
                    </button>
                </div>
                <p class="text-sm text-gray-600 mt-2">Try hovering and using Tab key to see focus states with Estonian brand colors and smooth transitions.</p>
            </div>
            
            <!-- Button Code Examples -->
            <div class="mt-8 bg-gray-50 p-6 rounded-lg">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Tailwind 4.0+ Button Examples</h4>
                <div class="space-y-4 text-sm">
                    <div>
                        <h5 class="font-medium mb-2">Primary Button:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">
&lt;button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"&gt;
    Button Text
&lt;/button&gt;
                        </code>
                    </div>
                    <div>
                        <h5 class="font-medium mb-2">Outline Button:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">
&lt;button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-600 bg-transparent border-2 border-blue-600 rounded-md hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"&gt;
    Button Text
&lt;/button&gt;
                        </code>
                    </div>
                </div>
            </div>
        </section>

        <!-- Card Components -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Card Components</h2>
            
            <!-- FIXED: Using Tailwind 4.0+ inline utilities instead of non-existent component classes -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <p class="text-green-700 text-sm">
                    ✅ <strong>Tailwind 4.0+ Cards:</strong> Using inline utilities instead of phantom .card classes.
                    All cards below use actual Tailwind classes with Estonian design principles.
                </p>
            </div>
            
            <!-- Card Variants -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Card Variants</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Basic Card -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Basic Card</h3>
                            <p class="text-gray-600 leading-relaxed">Simple card component with subtle shadow and rounded corners using modern Tailwind utilities.</p>
                        </div>
                    </div>

                    <!-- Hover Card -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-md hover:border-gray-300 hover:-translate-y-1">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Hover Card</h3>
                            <p class="text-gray-600 leading-relaxed">Hover over this card to see smooth elevation transition with Estonian design principles and subtle animation.</p>
                        </div>
                    </div>

                    <!-- Card with Icon -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">Icon Card</h3>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Card with icon element demonstrating visual hierarchy and Estonian color palette.</p>
                        </div>
                    </div>
                    
                    <!-- Meta Info Card (Clean, No Icons) -->
                    <div class="rounded-lg p-1 min-w-20 border border-gray-200">
                        <div class="text-[10px] text-gray-400 uppercase tracking-wide leading-tight">Meta Label</div>
                        <div class="text-xs font-medium text-gray-900">Meta Value</div>
                        <p class="text-xs text-gray-500 mt-1">Clean meta info card without icons. Used for product details like brand, categories, SKU, EAN.</p>
                    </div>
                    
                    <!-- Meta Info Card with Link (Brand/Category) -->
                    <div class="rounded-lg p-1 min-w-20 border border-gray-200">
                        <div class="text-[10px] text-gray-400 uppercase tracking-wide leading-tight">Clickable Label</div>
                        <div class="text-xs font-medium"><a href="#" class="text-gray-900 hover:text-blue-600">Linked Value</a></div>
                        <p class="text-xs text-gray-500 mt-1">Clickable version for brand and category links with subtle hover effect.</p>
                    </div>
                </div>
            </div>
            
            <!-- Card Layouts -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Card Layouts</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Card with Header & Footer -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                            <h4 class="text-sm font-medium text-gray-900">Card Header</h4>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Complete Card</h3>
                            <p class="text-gray-600 leading-relaxed mb-4">Card with header and footer sections for structured content layout following Estonian design standards.</p>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                            <button class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                                Action
                            </button>
                        </div>
                    </div>

                    <!-- Horizontal Card -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <div class="flex">
                            <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 flex-shrink-0 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </div>
                            <div class="flex-1 p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Horizontal Card</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Side-by-side layout perfect for media content with Estonian brand gradient.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card States -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Card States</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Success Card -->
                    <div class="bg-white rounded-lg shadow-sm border-l-4 border-green-500 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900">Success</h3>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">Operation completed successfully with green accent border.</p>
                        </div>
                    </div>

                    <!-- Warning Card -->
                    <div class="bg-white rounded-lg shadow-sm border-l-4 border-amber-500 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-amber-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900">Warning</h3>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">Important notice with amber accent requiring attention.</p>
                        </div>
                    </div>

                    <!-- Error Card -->
                    <div class="bg-white rounded-lg shadow-sm border-l-4 border-red-500 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900">Error</h3>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">Error state with red accent border indicating failure.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card Code Examples -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Tailwind 4.0+ Card Examples</h4>
                <div class="space-y-4 text-sm">
                    <div>
                        <h5 class="font-medium mb-2">Basic Card:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">
&lt;div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden"&gt;
    &lt;div class="p-6"&gt;
        &lt;h3 class="text-lg font-semibold text-gray-900 mb-2"&gt;Card Title&lt;/h3&gt;
        &lt;p class="text-gray-600 leading-relaxed"&gt;Card content&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;
                        </code>
                    </div>
                    <div>
                        <h5 class="font-medium mb-2">Hover Card:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">
&lt;div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-md hover:border-gray-300 hover:-translate-y-1"&gt;
    &lt;div class="p-6"&gt;...&lt;/div&gt;
&lt;/div&gt;
                        </code>
                    </div>
                    <div>
                        <h5 class="font-medium mb-2">Card with Header & Footer:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">
&lt;div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden"&gt;
    &lt;div class="px-6 py-4 border-b border-gray-200 bg-gray-50"&gt;Header&lt;/div&gt;
    &lt;div class="p-6"&gt;Content&lt;/div&gt;
    &lt;div class="px-6 py-4 border-t border-gray-200 bg-gray-50"&gt;Footer&lt;/div&gt;
&lt;/div&gt;
                        </code>
                    </div>
                </div>
            </div>
        </section>

        <!-- Badges & Alerts -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Badges & Alerts</h2>
            
            <!-- FIXED: Using Tailwind 4.0+ inline utilities instead of phantom badge/alert classes -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <p class="text-green-700 text-sm">
                    ✅ <strong>Tailwind 4.0+ Badges & Alerts:</strong> Using inline utilities instead of phantom .badge/.alert classes.
                    All components below use actual Tailwind classes with Estonian design standards.
                </p>
            </div>
            
            <!-- Badge Variants -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Badge Variants</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Status Badges -->
                    <div>
                        <h4 class="text-lg font-medium text-gray-900 mb-3">Status Badges</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Primary</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Success</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Warning</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Error</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Neutral</span>
                        </div>
                    </div>
                    
                    <!-- Product Badges -->
                    <div>
                        <h4 class="text-lg font-medium text-gray-900 mb-3">Product Badges</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-red-500 to-red-600 text-white">-25%</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-green-500 to-emerald-500 text-white">New</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-purple-500 to-purple-600 text-white">Featured</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-orange-500 to-orange-600 text-white">Hot</span>
                        </div>
                    </div>
                    
                    <!-- Size Variants -->
                    <div>
                        <h4 class="text-lg font-medium text-gray-900 mb-3">Size Variants</h4>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">Small</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800">Default</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-base font-medium bg-blue-100 text-blue-800">Large</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alert Variants -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Alert Variants</h3>
                <div class="space-y-4">
                    <!-- Info Alert -->
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            <div class="flex-1">
                                <h4 class="text-blue-800 font-medium">Information</h4>
                                <p class="text-blue-700 text-sm mt-1">This design system is built with Tailwind CSS 4.0 and Estonian brand colors in OKLCH format.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Success Alert -->
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-400 mt-0.5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <div class="flex-1">
                                <h4 class="text-green-800 font-medium">Success</h4>
                                <p class="text-green-700 text-sm mt-1">All components are using modern design tokens and accessibility best practices.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Warning Alert -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-yellow-400 mt-0.5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                            <div class="flex-1">
                                <h4 class="text-yellow-800 font-medium">Warning</h4>
                                <p class="text-yellow-700 text-sm mt-1">Please check your browser compatibility when using OKLCH color format.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Error Alert -->
                    <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-red-400 mt-0.5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            <div class="flex-1">
                                <h4 class="text-red-800 font-medium">Error</h4>
                                <p class="text-red-700 text-sm mt-1">Failed to load component. Please check your configuration and try again.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Code Examples -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Tailwind 4.0+ Code Examples</h4>
                <div class="grid md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <h5 class="font-medium mb-2">Status Badge:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">&lt;span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800"&gt;Primary&lt;/span&gt;</code>
                    </div>
                    <div>
                        <h5 class="font-medium mb-2">Info Alert:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">&lt;div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg"&gt;...&lt;/div&gt;</code>
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Elements -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Form Elements</h2>
            
            <!-- FIXED: Using Tailwind 4.0+ inline utilities instead of phantom button classes -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <p class="text-green-700 text-sm">
                    ✅ <strong>Tailwind 4.0+ Form Elements:</strong> Using inline utilities for all form components.
                    All inputs, selects, and buttons use actual Tailwind classes with Estonian brand focus states.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Basic Form -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Basic Form</h3>
                    <form class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="your@email.com" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="4" placeholder="Your message here..." 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 resize-vertical"></textarea>
                        </div>
                        
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select id="category" name="category" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                <option>General Inquiry</option>
                                <option>Technical Support</option>
                                <option>Sales Question</option>
                            </select>
                        </div>
                        
                        <button type="submit" 
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                            Send Message
                        </button>
                    </form>
                </div>
                
                <!-- Advanced Form Elements -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Form Variants</h3>
                    <div class="space-y-6">
                        <!-- Checkbox Group -->
                        <div>
                            <fieldset>
                                <legend class="block text-sm font-medium text-gray-700 mb-2">Preferences</legend>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" 
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-colors duration-200">
                                        <span class="ml-2 text-sm text-gray-700">Email notifications</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" checked 
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-colors duration-200">
                                        <span class="ml-2 text-sm text-gray-700">Newsletter subscription</span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        
                        <!-- Radio Group -->
                        <div>
                            <fieldset>
                                <legend class="block text-sm font-medium text-gray-700 mb-2">Contact Method</legend>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="contact" value="email" 
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 transition-colors duration-200">
                                        <span class="ml-2 text-sm text-gray-700">Email</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="contact" value="phone" checked 
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 transition-colors duration-200">
                                        <span class="ml-2 text-sm text-gray-700">Phone</span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        
                        <!-- Range Input -->
                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">Budget Range</label>
                            <input type="range" id="budget" name="budget" min="0" max="100" value="50" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <div class="flex justify-between text-xs text-gray-500 mt-1">
                                <span>€0</span>
                                <span>€50k</span>
                                <span>€100k+</span>
                            </div>
                        </div>
                        
                        <!-- File Input -->
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Attachment</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition-colors duration-200">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, PDF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form States -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Form States</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Error State -->
                    <div>
                        <label for="error-input" class="block text-sm font-medium text-gray-700 mb-1">Error State</label>
                        <input type="text" id="error-input" value="invalid@email" 
                               class="w-full px-3 py-2 border border-red-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 bg-red-50">
                        <p class="text-red-600 text-xs mt-1">Please enter a valid email address</p>
                    </div>
                    
                    <!-- Success State -->
                    <div>
                        <label for="success-input" class="block text-sm font-medium text-gray-700 mb-1">Success State</label>
                        <input type="text" id="success-input" value="user@example.com" 
                               class="w-full px-3 py-2 border border-green-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-green-50">
                        <p class="text-green-600 text-xs mt-1">Email address is valid</p>
                    </div>
                    
                    <!-- Disabled State -->
                    <div>
                        <label for="disabled-input" class="block text-sm font-medium text-gray-400 mb-1">Disabled State</label>
                        <input type="text" id="disabled-input" value="Cannot edit this field" disabled 
                               class="w-full px-3 py-2 border border-gray-200 rounded-md shadow-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                        <p class="text-gray-400 text-xs mt-1">This field cannot be edited</p>
                    </div>
                </div>
            </div>
            
            <!-- Form Code Examples -->
            <div class="mt-8 bg-gray-50 p-6 rounded-lg">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Tailwind 4.0+ Form Examples</h4>
                <div class="grid md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <h5 class="font-medium mb-2">Text Input:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">&lt;input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"&gt;</code>
                    </div>
                    <div>
                        <h5 class="font-medium mb-2">Submit Button:</h5>
                        <code class="block bg-white p-2 rounded border text-xs overflow-x-auto">&lt;button class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-md"&gt;</code>
                    </div>
                </div>
            </div>
            
            <p class="text-sm text-gray-600 mt-4">Focus on form elements to see Estonian brand color focus states with smooth transitions.</p>
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
                
                <!-- Brand Certificate -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                    </svg>
                    <div class="text-sm font-medium">Brand</div>
                </div>
                
                <!-- Product Code Lines -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-indigo-600 rotate-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                    <div class="text-sm font-medium">Product Code</div>
                </div>
                
                <!-- Categories List -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                    </svg>
                    <div class="text-sm font-medium">Categories</div>
                </div>
                
                <!-- EAN Fingerprint -->
                <div class="text-center">
                    <svg class="icon icon-2xl mx-auto mb-2 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525" />
                    </svg>
                    <div class="text-sm font-medium">EAN</div>
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
                
                <!-- FIXED: Using Tailwind 4.0+ inline utilities instead of phantom button classes -->
                <div class="bg-green-50 border border-green-200 rounded-lg p-3 mb-4">
                    <p class="text-green-700 text-sm">
                        ✅ <strong>Fixed:</strong> Replaced phantom .btn classes with proper Tailwind 4.0+ inline utilities.
                    </p>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Add to Cart
                    </button>
                    
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-green-600 to-emerald-600 rounded-md shadow-sm hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Confirm Order
                    </button>
                    
                    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-600 bg-transparent border-2 border-blue-600 rounded-md hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        Search Products
                    </button>
                </div>
            </div>
        </section>

        <!-- WooCommerce Product Cards -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">WooCommerce Product Cards</h2>
            
            <!-- TAILWIND 4.0+ INLINE UTILITIES -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-8">
                <p class="text-green-700 text-sm">
                    ✅ <strong>Tailwind 4.0+ Approach:</strong> All product cards below use inline utility classes for maximum maintainability and performance.
                    No separate CSS files needed - everything is defined directly in HTML.
                </p>
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
                            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2 transition-colors duration-150 relative">
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
                            <span class="absolute top-2 left-2 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-red-500 to-red-600 text-white">
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
                            <span class="absolute top-2 left-2 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-purple-500 to-purple-600 text-white">
                                Featured
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
                            <span class="absolute top-2 left-2 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-green-500 to-emerald-500 text-white">
                                New
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
                            <span class="absolute top-2 left-2 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-red-500 to-red-600 text-white">
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
                        <form class="cart space-y-3">
                            <div class="border-t border-gray-200 pt-0"></div>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <div class="flex items-center space-x-3">
                                    <label class="text-sm font-semibold text-gray-700">Kogus:</label>
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button type="button" class="px-2 py-2 text-gray-600 hover:text-gray-800 cursor-pointer">−</button>
                                        <input type="number" value="1" min="1" class="w-12 py-2 text-center border-0 focus:ring-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                        <button type="button" class="px-2 py-2 text-gray-600 hover:text-gray-800 cursor-pointer">+</button>
                                    </div>
                                </div>
                                <div class="flex gap-3 flex-1">
                                    <!-- Using standardized Button Component styles -->
                                    <button type="submit" class="flex-1 inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        Lisa korvi
                                    </button>
                                    <button type="button" class="flex-1 inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-green-600 to-emerald-600 rounded-md shadow-sm hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200">
                                        Osta kohe
                                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Meta Info Cards -->
                        <div class="border-t border-gray-200 pt-4">
                            <h4 class="text-sm font-medium text-gray-900 mb-3">Product Meta Information</h4>
                            
                            <!-- Complete Example: All 4 meta info items present -->
                            <div class="mb-6">
                                <p class="text-xs text-gray-500 mb-2">Complete example (all meta info present):</p>
                                <div class="flex items-center">
                                    <?php
                                    // Demo data - all fields present
                                    $demo_brand = 'Demo Brand';
                                    $demo_categories = 'Mööbel, Söögilauad';
                                    $demo_sku = 'DEMO-12345';
                                    $demo_ean = '1234567890123';
                                    
                                    $meta_items = [];
                                    
                                    // Collect available meta items
                                    if (!empty($demo_brand)) {
                                        $meta_items[] = [
                                            'label' => 'Bränd',
                                            'value' => $demo_brand,
                                            'link' => '/brand/demo-brand/',
                                            'clickable' => true
                                        ];
                                    }
                                    
                                    if (!empty($demo_categories)) {
                                        $meta_items[] = [
                                            'label' => 'Kategooriad',
                                            'value' => $demo_categories,
                                            'link' => '/product-category/mööbel/',
                                            'clickable' => true
                                        ];
                                    }
                                    
                                    if (!empty($demo_sku)) {
                                        $meta_items[] = [
                                            'label' => 'Tootekood',
                                            'value' => $demo_sku,
                                            'clickable' => false
                                        ];
                                    }
                                    
                                    if (!empty($demo_ean)) {
                                        $meta_items[] = [
                                            'label' => 'EAN',
                                            'value' => $demo_ean,
                                            'clickable' => false
                                        ];
                                    }
                                    
                                    // Render meta items with conditional dividers
                                    foreach ($meta_items as $index => $item) {
                                        echo '<div class="rounded-lg p-1 min-w-20">';
                                        echo '    <div class="text-[10px] text-gray-400 uppercase tracking-wide leading-tight">' . esc_html($item['label']) . '</div>';
                                        
                                        // Render value as link if clickable
                                        if (!empty($item['clickable']) && $item['clickable']) {
                                            echo '    <div class="text-xs font-medium"><a href="' . esc_url($item['link']) . '" class="text-gray-900 hover:text-blue-600">' . esc_html($item['value']) . '</a></div>';
                                        } else {
                                            echo '    <div class="text-xs font-medium text-gray-900">' . esc_html($item['value']) . '</div>';
                                        }
                                        
                                        echo '</div>';
                                        
                                        // Add divider if not the last item
                                        if ($index < count($meta_items) - 1) {
                                            echo '<div class="h-8 w-px bg-gray-200 mx-2"></div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <!-- Missing Brand Example -->
                            <div class="mb-6">
                                <p class="text-xs text-gray-500 mb-2">Example with missing brand (no orphaned divider):</p>
                                <div class="flex items-center">
                                    <?php
                                    // Demo data - brand missing
                                    $demo_brand_missing = '';
                                    $demo_categories_2 = 'Mööbel, Söögilauad';
                                    $demo_sku_2 = 'DEMO-67890';
                                    $demo_ean_2 = '9876543210987';
                                    
                                    $meta_items_2 = [];
                                    
                                    if (!empty($demo_brand_missing)) {
                                        $meta_items_2[] = [
                                            'label' => 'Bränd',
                                            'value' => $demo_brand_missing,
                                            'link' => '/brand/demo-brand/',
                                            'clickable' => true
                                        ];
                                    }
                                    
                                    if (!empty($demo_categories_2)) {
                                        $meta_items_2[] = [
                                            'label' => 'Kategooriad',
                                            'value' => $demo_categories_2,
                                            'link' => '/product-category/mööbel/',
                                            'clickable' => true
                                        ];
                                    }
                                    
                                    if (!empty($demo_sku_2)) {
                                        $meta_items_2[] = [
                                            'label' => 'Tootekood',
                                            'value' => $demo_sku_2,
                                            'clickable' => false
                                        ];
                                    }
                                    
                                    if (!empty($demo_ean_2)) {
                                        $meta_items_2[] = [
                                            'label' => 'EAN',
                                            'value' => $demo_ean_2,
                                            'clickable' => false
                                        ];
                                    }
                                    
                                    foreach ($meta_items_2 as $index => $item) {
                                        echo '<div class="rounded-lg p-1 min-w-20">';
                                        echo '    <div class="text-[10px] text-gray-400 uppercase tracking-wide leading-tight">' . esc_html($item['label']) . '</div>';
                                        
                                        // Render value as link if clickable
                                        if (!empty($item['clickable']) && $item['clickable']) {
                                            echo '    <div class="text-xs font-medium"><a href="' . esc_url($item['link']) . '" class="text-gray-900 hover:text-blue-600">' . esc_html($item['value']) . '</a></div>';
                                        } else {
                                            echo '    <div class="text-xs font-medium text-gray-900">' . esc_html($item['value']) . '</div>';
                                        }
                                        
                                        echo '</div>';
                                        
                                        if ($index < count($meta_items_2) - 1) {
                                            echo '<div class="h-8 w-px bg-gray-200 mx-2"></div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <!-- Only SKU Example -->
                            <div class="mb-6">
                                <p class="text-xs text-gray-500 mb-2">Example with only SKU available (no dividers needed):</p>
                                <div class="flex items-center">
                                    <div class="rounded-lg p-1 min-w-20">
                                        <div class="text-[10px] text-gray-400 uppercase tracking-wide leading-tight">Tootekood</div>
                                        <div class="text-xs font-medium text-gray-900">ONLY-SKU-123</div>
                                    </div>
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
        

        <!-- WooCommerce Product Tabs Component -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">WooCommerce Product Tabs</h2>
            
            <!-- Product Information Layout -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Interactive Product Information</h3>
                
                <div x-data="{ openAccordion: null }">
                    <!-- Single Container: Description + Accordion -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-8">
                        <!-- Product Description -->
                        <div class="p-6 border-b border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Toote kirjeldus</h4>
                            <div class="prose max-w-none">
                                <p class="text-gray-700 mb-4">See on professionaalne pikendatav söögilaud, mis sobib ideaalselt nii igapäevaseks kasutamiseks kui ka külaliste vastuvõtmiseks. Laua pind on valmistatud kvaliteetsest tammevineerist ning raam valgest peitsist.</p>
                                <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                                    <li>Kvaliteetne tammevineer pind</li>
                                    <li>Valge peitsitud raam</li>
                                    <li>Pikendatav disain (160-200cm)</li>
                                    <li>Mahutab kuni 8 isikut</li>
                                    <li>Lihtne hooldus</li>
                                </ul>
                                <p class="text-gray-700">Toode sobib hästi nii kaasaegsesse kui ka klassikalisesse interjööri. Materjal on keskkonnasõbralik ja vastupidav igapäevasele kasutamisele.</p>
                            </div>
                        </div>
                        
                        <!-- Accordion -->
                        <!-- Lisainfo Accordion Item -->
                        <div class="border-b border-gray-200 last:border-b-0">
                            <button 
                                @click="openAccordion = openAccordion === 'additional' ? null : 'additional'"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200"
                            >
                                <span class="font-medium text-gray-900">Lisainfo</span>
                                <svg 
                                    :class="openAccordion === 'additional' ? 'rotate-180' : ''"
                                    class="w-5 h-5 text-gray-500 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke-width="1.5" 
                                    stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            <div 
                                x-show="openAccordion === 'additional'" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-96"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 max-h-96"
                                x-transition:leave-end="opacity-0 max-h-0"
                                class="px-6 pb-4 overflow-hidden"
                            >
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                            <span class="font-medium text-gray-700">Mõõdud:</span>
                                            <span class="text-gray-600">160-200 x 90 x 75 cm</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                            <span class="font-medium text-gray-700">Materjal:</span>
                                            <span class="text-gray-600">Tammevineer, männipuit</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                            <span class="font-medium text-gray-700">Värv:</span>
                                            <span class="text-gray-600">Valge peits</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                            <span class="font-medium text-gray-700">Kaal:</span>
                                            <span class="text-gray-600">45 kg</span>
                                        </div>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                            <span class="font-medium text-gray-700">Päritolumaa:</span>
                                            <span class="text-gray-600">Eesti</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                            <span class="font-medium text-gray-700">Garantii:</span>
                                            <span class="text-gray-600">24 kuud</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                            <span class="font-medium text-gray-700">Hooldus:</span>
                                            <span class="text-gray-600">Niiske lapp</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                            <span class="font-medium text-gray-700">EAN:</span>
                                            <span class="text-gray-600">1234567890123</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        
                        <!-- Tarneinfo Accordion Item -->
                        <div class="border-b border-gray-200 last:border-b-0">
                            <button 
                                @click="openAccordion = openAccordion === 'shipping' ? null : 'shipping'"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200"
                            >
                                <span class="font-medium text-gray-900">Tarneinfo</span>
                                <svg 
                                    :class="openAccordion === 'shipping' ? 'rotate-180' : ''"
                                    class="w-5 h-5 text-gray-500 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke-width="1.5" 
                                    stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            <div 
                                x-show="openAccordion === 'shipping'" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-96"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 max-h-96"
                                x-transition:leave-end="opacity-0 max-h-0"
                                class="px-6 pb-4 overflow-hidden"
                            >
                                <div class="grid md:grid-cols-2 gap-8">
                                    <div>
                                        <h5 class="font-semibold text-gray-900 mb-3">📦 Tarneviisid</h5>
                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-md">
                                                <span class="text-gray-700">Kullertarne</span>
                                                <span class="font-medium text-gray-900">19.99 €</span>
                                            </div>
                                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-md">
                                                <span class="text-gray-700">Pakipunkt</span>
                                                <span class="font-medium text-gray-900">4.99 €</span>
                                            </div>
                                            <div class="flex justify-between items-center p-3 bg-green-50 rounded-md">
                                                <span class="text-gray-700">Tasuta tarne (üle 150€)</span>
                                                <span class="font-medium text-green-600">0.00 €</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-gray-900 mb-3">🔄 Tagastamine</h5>
                                        <div class="space-y-2 text-gray-700">
                                            <p>• 14-päevane tagastusõigus</p>
                                            <p>• Toode peab olema kasutamata</p>
                                            <p>• Originaalpakend vajalik</p>
                                            <p>• Tagastuskulud ostja kanda</p>
                                            <p>• Raha tagasi 3-5 tööpäeva jooksul</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Separate Reviews Block -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6" x-data="{ 
                        showReviewModal: false,
                        leftOpacity: 0,
                        rightOpacity: 0,
                        fadeDistance: 80
                    }">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-lg font-semibold text-gray-900">Klientide arvustused (5)</h4>
                            <button 
                                @click="showReviewModal = true"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"
                            >
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Lisa arvustus
                            </button>
                        </div>
                        
                        <!-- Horizontal Reviews Cards with Overflow Scroll and Progressive Gradients -->
                        <div class="relative -mx-2">
                            <div 
                                class="flex gap-6 overflow-x-auto pb-4 px-2"
                                x-ref="reviewsContainer"
                                @wheel="
                                    const el = $refs.reviewsContainer;
                                    $event.preventDefault();
                                    // Smooth horizontal scroll with mouse wheel
                                    el.scrollLeft += $event.deltaY * 0.5;
                                "
                                @scroll="
                                    const el = $refs.reviewsContainer;
                                    const fade = fadeDistance;
                                    
                                    // Calculate left and right gradient opacities
                                    leftOpacity = Math.min(el.scrollLeft / fade, 1);
                                    const scrollRight = el.scrollLeft + el.clientWidth;
                                    const distanceFromRight = el.scrollWidth - scrollRight;
                                    rightOpacity = el.scrollWidth > el.clientWidth ? Math.min(distanceFromRight / fade, 1) : 0;
                                "
                                x-init="
                                    $nextTick(() => {
                                        const el = $refs.reviewsContainer;
                                        // Initialize right gradient if content overflows
                                        leftOpacity = 0;
                                        rightOpacity = el.scrollWidth > el.clientWidth ? 1 : 0;
                                    });
                                "
                            >
                            <!-- Review Card 1 -->
                            <div class="bg-gray-50 rounded-lg p-6 w-[60%] md:w-[40%] flex-shrink-0 border border-gray-200">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold">
                                        MK
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Marju K.</div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★★</span>
                                            </div>
                                            <span class="text-sm text-gray-500">15. juuni 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-700 leading-relaxed">"Suurepärane laud! Kvaliteet on väga hea ja pikendamine toimib sujuvalt. Soovitan kindlasti!"</p>
                            </div>
                            
                            <!-- Review Card 2 -->
                            <div class="bg-gray-50 rounded-lg p-6 w-[60%] md:w-[40%] flex-shrink-0 border border-gray-200">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center text-white font-semibold">
                                        AM
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Andres M.</div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★☆</span>
                                            </div>
                                            <span class="text-sm text-gray-500">3. juuni 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-700 leading-relaxed">"Väga ilus laud, sobib hästi meie köögiga. Ainuke miinus on see, et kokkupanek võttis natuke aega."</p>
                            </div>
                            
                            <!-- Review Card 3 -->
                            <div class="bg-gray-50 rounded-lg p-6 w-[60%] md:w-[40%] flex-shrink-0 border border-gray-200">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full flex items-center justify-center text-white font-semibold">
                                        KL
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Kristiina L.</div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★★</span>
                                            </div>
                                            <span class="text-sm text-gray-500">28. mai 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-700 leading-relaxed">"Olen väga rahul ostuga. Laud on tugev ja ilus, just selline nagu pildi peal. Tarne oli kiire."</p>
                            </div>
                            
                            <!-- Additional Review Cards for Demo -->
                            <div class="bg-gray-50 rounded-lg p-6 w-[60%] md:w-[40%] flex-shrink-0 border border-gray-200">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                                        TR
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Toomas R.</div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★★</span>
                                            </div>
                                            <span class="text-sm text-gray-500">20. mai 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-700 leading-relaxed">"Väga kvaliteetne toode! Laud sobib ideaalselt meie söögituppa ja lisaruumi on alati vaja."</p>
                            </div>
                            
                            <div class="bg-gray-50 rounded-lg p-6 w-[60%] md:w-[40%] flex-shrink-0 border border-gray-200">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-full flex items-center justify-center text-white font-semibold">
                                        EK
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Eva K.</div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★☆</span>
                                            </div>
                                            <span class="text-sm text-gray-500">12. mai 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-700 leading-relaxed">"Ilus disain ja hästi tehtud. Ainuke asi, et tarneaeg võiks olla kiirem, aga muidu olen rahul."</p>
                            </div>
                            </div>
                            
                            <!-- Left Gradient Overlay -->
                            <div 
                                x-show="leftOpacity > 0" 
                                :style="{ opacity: leftOpacity }"
                                x-transition:enter="transition-opacity duration-250 ease-out" 
                                x-transition:leave="transition-opacity duration-250 ease-in"
                                class="absolute top-0 bottom-4 left-0 w-8 bg-gradient-to-r from-white via-white/70 to-transparent pointer-events-none z-10"
                            ></div>
                            
                            <!-- Right Gradient Overlay -->
                            <div 
                                x-show="rightOpacity > 0" 
                                :style="{ opacity: rightOpacity }"
                                x-transition:enter="transition-opacity duration-250 ease-out" 
                                x-transition:leave="transition-opacity duration-250 ease-in"
                                class="absolute top-0 bottom-4 right-0 w-8 bg-gradient-to-l from-white via-white/70 to-transparent pointer-events-none z-10"
                            ></div>
                        </div>
                        
                        <!-- Scroll Indicator -->
                        <div class="flex justify-center mt-4">
                            <div class="text-sm text-gray-500 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l3-3m0 0l3 3m-3-3v12" transform="rotate(90)"></path>
                                </svg>
                                Keri horisontaalselt, et näha kõiki arvustusi
                            </div>
                        </div>
                        
                        <!-- Review Modal -->
                        <div 
                            x-show="showReviewModal"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 z-50 overflow-y-auto"
                            @click.away="showReviewModal = false"
                            style="display: none;"
                        >
                            <!-- Modal Background -->
                            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                                
                                <!-- Modal Content -->
                                <div 
                                    x-show="showReviewModal"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl"
                                >
                                    <!-- Modal Header -->
                                    <div class="flex items-center justify-between mb-6">
                                        <h3 class="text-lg font-semibold text-gray-900">Lisa oma arvustus</h3>
                                        <button 
                                            @click="showReviewModal = false"
                                            class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <!-- Modal Form -->
                                    <form @submit.prevent="console.log('Review submitted')" class="space-y-6">
                                        <!-- Name Field -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Nimi</label>
                                            <input 
                                                type="text" 
                                                placeholder="Sinu nimi"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                                required
                                            >
                                        </div>
                                        
                                        <!-- Rating Field -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Hinnang</label>
                                            <div class="flex items-center gap-2" x-data="{ rating: 5 }">
                                                <template x-for="star in 5">
                                                    <button 
                                                        type="button"
                                                        @click="rating = star"
                                                        :class="star <= rating ? 'text-yellow-400' : 'text-gray-300'"
                                                        class="text-2xl hover:text-yellow-400 transition-colors duration-200"
                                                    >
                                                        ★
                                                    </button>
                                                </template>
                                                <span class="ml-2 text-sm text-gray-600" x-text="rating + '/5 tähte'"></span>
                                            </div>
                                        </div>
                                        
                                        <!-- Review Text -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Arvustus</label>
                                            <textarea 
                                                rows="4"
                                                placeholder="Kirjuta oma arvustus siia..."
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-none"
                                                required
                                            ></textarea>
                                        </div>
                                        
                                        <!-- Modal Actions -->
                                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                                            <button 
                                                type="button"
                                                @click="showReviewModal = false"
                                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"
                                            >
                                                Tühista
                                            </button>
                                            <button 
                                                type="submit"
                                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"
                                            >
                                                Lisa arvustus
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Code Example -->
                <div class="mt-6 bg-gray-900 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2">HTML + Alpine.js kood:</h4>
                    <pre class="text-green-400 text-sm overflow-x-auto"><code>&lt;div x-data="{ openAccordion: null }"&gt;
  &lt;button @click="openAccordion = openAccordion === 'additional' ? null : 'additional'"&gt;Lisainfo&lt;/button&gt;
  &lt;div x-show="openAccordion === 'additional'" x-transition&gt;...&lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </section>

        <!-- WooCommerce Cart & Checkout Components -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">WooCommerce Cart & Checkout</h2>
            
            <!-- Cart Table Component -->
            <div class="mb-12">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Shopping Cart Table</h3>
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Toode</th>
                                    <th class="text-center py-3 px-4 font-semibold text-gray-700">Hind</th>
                                    <th class="text-center py-3 px-4 font-semibold text-gray-700">Kogus</th>
                                    <th class="text-center py-3 px-4 font-semibold text-gray-700">Kokku</th>
                                    <th class="w-8"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-4">
                                            <img src="http://localhost/wordpress/wp-content/uploads/2025/06/Pikendatav_soogilaud_Strada_valge_peitsiga_tammevineer_12017_exposed_3-600x600.webp" alt="Product" class="w-16 h-16 rounded object-cover">
                                            <div>
                                                <h4 class="font-medium text-gray-900 text-base">Pikendatav söögilaud Strada</h4>
                                                <p class="text-gray-500 text-sm">Valge peits, tammevineer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center py-4 px-4 font-medium text-gray-900">299.99 €</td>
                                    <td class="text-center py-4 px-4">
                                        <div class="inline-flex items-center border border-gray-300 rounded-md">
                                            <button class="px-2 py-1 text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">-</button>
                                            <input type="number" value="1" min="1" class="w-12 text-center py-1 border-0 focus:ring-0 text-sm">
                                            <button class="px-2 py-1 text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">+</button>
                                        </div>
                                    </td>
                                    <td class="text-center py-4 px-4 font-semibold text-gray-900">299.99 €</td>
                                    <td class="text-center py-4 px-4">
                                        <button class="text-red-500 hover:text-red-700 p-1 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 flex justify-between items-center">
                        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            Uuenda ostukorv
                        </button>
                        <div class="text-right">
                            <p class="text-lg font-semibold text-gray-900">Kokku: 299.99 €</p>
                            <p class="text-sm text-gray-500">KM sisaldub</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Checkout Form Component -->
            <div class="mb-12">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Checkout Form</h3>
                <div class="grid lg:grid-cols-2 gap-8">
                    <!-- Billing Details -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Arveandmed</h4>
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" placeholder="Eesnimi" class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <input type="text" placeholder="Perekonnanimi" class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <input type="email" placeholder="E-post" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <input type="tel" placeholder="Telefon" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <input type="text" placeholder="Aadress" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" placeholder="Linn" class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <input type="text" placeholder="Postiindeks" class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Tellimuse kokkuvõte</h4>
                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Pikendatav söögilaud Strada × 1</span>
                                <span class="font-medium">299.99 €</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-600">Transport</span>
                                <span class="font-medium">19.99 €</span>
                            </div>
                            <div class="border-t border-gray-200 pt-3">
                                <div class="flex justify-between items-center text-lg font-semibold">
                                    <span>Kokku</span>
                                    <span>319.98 €</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Methods -->
                        <div class="mb-6">
                            <h5 class="font-semibold text-gray-900 mb-3">Makseviis</h5>
                            <div class="space-y-2">
                                <label class="flex items-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" name="payment" class="text-blue-600 focus:ring-blue-500" checked>
                                    <span class="ml-3 text-sm font-medium">Pangalink</span>
                                </label>
                                <label class="flex items-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" name="payment" class="text-blue-600 focus:ring-blue-500">
                                    <span class="ml-3 text-sm font-medium">Kaardimakse</span>
                                </label>
                            </div>
                        </div>
                        
                        <button class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-4 rounded-md font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-200">
                            Vormista tellimus
                        </button>
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
