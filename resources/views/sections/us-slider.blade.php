{{-- Slider Section bg-[#dfe6db] --}}
<section id="us" x-data="slider" class="bg-[#dfe6db] min-h-screen flex items-center ">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        {{-- left --}}
        <div class="flex flex-col items-start pl-6 lg:pl-24">

            <div :key="index" class="transition-opacity duration-5 ease-out" x-transition.opacity>
                <h4 class="font-sans italic text-teal-900 text-4xl mb-6" x-text="slides[index].tag"></h4>
                <h2 class="text-3xl lg:text-4xl font-serif text-slate-900 leading-snug mb-6" x-text="slides[index].title">
                </h2>
                <a href="{{ route('court.index') }}"
                    class="inline-block mt-4 text-sm font-sans uppercase tracking-wide border-b border-slate-900 pb-1">
                    Book Now
                </a>
            </div>
            {{-- arrowz --}}
            <div class="flex gap-4 mt-10">
                <!-- Prev -->
                <button @click="prev"
                    class="w-10 h-10 border border-slate-700 rounded-full flex items-center justify-center
                text-slate-700 hover:bg-slate-50 select-none active:scale-95 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </button>
                <!-- Next -->
                <button @click="next"
                    class="w-10 h-10 border border-slate-700 rounded-full flex items-center justify-center
                         text-slate-700 hover:bg-slate-50 select-none active:scale-95 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>
        </div>
        {{-- right --}}
        <div class="relative w-full flex justify-end pr-20">
            <!-- Portrait Frame -->
            <div class="relative aspect-[3/4] w-[320px] overflow-hidden bg-slate-200">
                <template x-for="(slide, i) in slides" :key="i">
                    <img :src="slide.image"
                        class="absolute inset-0 w-full h-full
                       object-cover object-[60%_50%]
                       transition-opacity duration-700 ease-out"
                        :class="{
                            'z-30 opacity-100': i === index,
                            'z-20 opacity-0': i !== index
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
                    image: '{{ asset('image/slider3.jpg') }}'
                    // image: 'https://i.pinimg.com/736x/0f/be/e0/0fbee037db056984864c81af1e85e615.jpg'
                },
                {
                    tag: 'Community & Lifestyle',
                    title: 'More than a court, it’s where players connect',
                    image: '{{ asset('image/slider4.jpg') }}'
                    // image: 'https://i.pinimg.com/736x/ca/59/63/ca5963b71a7759f667089bc44ee06413.jpg'
                },
                {
                    tag: 'Game at Your Pace',
                    title: 'From casual rallies to competitive matches',
                    image: '{{ asset('image/slider.jpg') }}'
                    // image: 'https://i.pinimg.com/1200x/0f/f3/c8/0ff3c88de6576f3ca24db20181724986.jpg'
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
