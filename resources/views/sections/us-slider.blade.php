{{-- Slider Section --}}
<section id="us" x-data="slider" class="bg-[#dfe6db] min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        {{-- left --}}
        <div class="flex flex-col items-start">

            <div :key="index" class="transition-opacity duration-5 ease-out" x-transition.opacity>

                <h4 class="italic text-teal-900 text-4xl mb-6" x-text="slides[index].tag"></h4>

                <h2 class="text-3xl lg:text-4xl font-serif text-slate-900 leading-snug mb-6" x-text="slides[index].title">
                </h2>

                <a href="{{ route('court.index') }}"
                    class="inline-block mt-4 text-sm uppercase tracking-wide border-b border-slate-900 pb-1">
                    Book Now
                </a>
            </div>

            {{-- arrowz --}}
            <div class="flex gap-4 mt-10">
                <button @click="prev"
                    class="w-10 h-10 border border-slate-700 rounded-full
                           flex items-center justify-center
                           select-none active:scale-95">
                    ←
                </button>
                <button @click="next"
                    class="w-10 h-10 border border-slate-700 rounded-full
                           flex items-center justify-center
                           select-none active:scale-95">
                    →
                </button>
            </div>
        </div>

        {{-- right --}}
        <div class="relative h-[420px] w-full flex justify-end overflow-hidden">

            <template x-for="(slide, i) in slides" :key="i">
                <img :src="slide.image"
                    class="absolute top-0 right-0 h-full w-[85%] object-cover rounded-xl
                           transform-gpu will-change-transform
                           transition-transform transition-opacity
                           duration-5 ease-out"
                    :class="{
                        'z-30 opacity-100 translate-x-6 scale-100': i === index,
                        'z-20 opacity-70 translate-x-3 scale-[0.99]': i === nextIndex(),
                        'z-10 opacity-0 translate-x-16 scale-[0.99]': i !== index && i !== nextIndex()
                    }">
            </template>
        </div>

    </div>
</section>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            index: 0,
            slides: [{
                    tag: 'The Experience',
                    title: 'Play in a space designed for focus and flow',
                    // image: '{{ asset('image/hero.jpg') }}'
                },
                {
                    tag: 'Community & Lifestyle',
                    title: 'More than a court, it’s where players connect',
                    // image: '{{ asset('image/lano.jpeg') }}'
                },
                {
                    tag: 'Game at Your Pace',
                    title: 'From casual rallies to competitive matches',
                    // image: '{{ asset('image/hero.jpg') }}'
                }
            ],
            next() {
                this.index = (this.index + 1) % this.slides.length
            },
            prev() {
                this.index = (this.index - 1 + this.slides.length) % this.slides.length
            },
            nextIndex() {
                return (this.index + 1) % this.slides.length
            }
        }))
    })
</script>
