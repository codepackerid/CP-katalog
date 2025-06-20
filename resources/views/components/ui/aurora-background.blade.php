@props([
    'showRadialGradient' => true
])

<div {{ $attributes->merge(['class' => 'relative flex flex-col h-[100vh] items-center justify-center bg-gray-50 text-slate-950 transition-bg overflow-hidden']) }}>
    <div class="absolute inset-0 overflow-hidden">
        <div class="
            absolute -inset-[10px] opacity-80 will-change-transform pointer-events-none
            {{ $showRadialGradient ? '[mask-image:radial-gradient(ellipse_at_100%_0%,black_20%,var(--transparent)_90%)]' : '' }}
            [--white-gradient:repeating-linear-gradient(100deg,var(--white)_0%,var(--white)_7%,var(--transparent)_10%,var(--transparent)_12%,var(--white)_16%)]
            [--dark-gradient:repeating-linear-gradient(100deg,var(--black)_0%,var(--black)_7%,var(--transparent)_10%,var(--transparent)_12%,var(--black)_16%)]
            [--aurora:repeating-linear-gradient(100deg,var(--blue-500)_10%,var(--indigo-300)_15%,var(--blue-300)_20%,var(--violet-200)_25%,var(--blue-400)_30%)]
            [background-image:var(--white-gradient),var(--aurora)]
            [background-size:300%,_200%] 
            [background-position:50%_50%,50%_50%] 
            filter blur-[8px]
            after:content-[""] after:absolute after:inset-0 after:[background-image:var(--white-gradient),var(--aurora)]
            after:[background-size:200%,_100%] 
            after:animate-aurora after:[background-attachment:fixed] after:mix-blend-difference
        ">
        </div>
    </div>
    
    {{ $slot }}
</div>
