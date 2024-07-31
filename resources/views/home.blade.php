<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie-Apps</title>
    @vite('resources/css/app.css')
</head>
<body>

<div class="w-full h-auto min-h-screen flex flex-col">
    {{-- header section --}}
    @include('navigasi')
    {{-- End section --}}

    {{-- banner section --}}
    <div class="w-full h-[512px] flex flex-col relative bg-black">
    @foreach ($banner as $bannerItem)
        
    
        {{-- Banner image section --}}
        <div class="flex flex-row items-center w-full h-full relative slide">
            <img src="{{$imageBaseURL}}/original{{$bannerItem->backdrop_path}}" class="absolute w-full h-full object-cover" alt="">
            <div class="w-full h-full absolute bg-black bg-opacity-40"></div>
            {{-- Title movie --}}
            <div class="w-10/12 flex flex-col ml-28 z-10">
                <span class="font-bold font-inter text-4xl text-white">{{$bannerItem->title}}</span>
                <span class="font-inter text-xl text-white w-1/2 line-clamp-2">{{$bannerItem->overview}}</span>
                <a href="/movie/{{$bannerItem->id}}" class="bg-develobe-700 text-white pl-2 py-2 mt-5 front-inter pr-4 text-sm flex flex-row rounded-full items-center hover:drop-shadow-lg duration-200 w-fit"><svg width='24' height='24' role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.0319 0c-.8823 0-1.0545.136-1.0545.136-.1738.056-.3556.255-.4105.43L9.683 3.3808c.4729.1729 1.3222.4266 2.2337.4266 1.0987 0 2.017-.3494 2.3763-.5075L13.4352.566c-.055-.1755-.237-.3707-.4067-.4374 0 0-.1142-.1286-.9966-.1286zm3.5645 7.455c-.3601.34-1.3276.9373-3.6797.9373-2.2929 0-3.189-.5678-3.5213-.9113l-1.3887 4.4227c.2272.3614 1.2539 1.5594 4.8847 1.5594 3.7569 0 4.8539-1.3467 5.0649-1.6737zm-8.5897 4.4487l-1.0025 3.1922H4.3428c-.2486 0-.5097.1932-.5826.4315l-2.334 7.6317a.3962.3962 0 0 0-.0169.1537c-.0008.0053-.002.0099-.002.016 0 .0839.0233.226.0233.226.0322.2456.2612.4452.5098.4452h20.1192c.2487 0 .4768-.1994.5098-.4453 0 0 .0234-.142.0234-.226a.0245.0245 0 0 0-.0025-.01.3201.3201 0 0 0 .0024-.0313.4096.4096 0 0 0-.019-.1282l-2.3339-7.6318c-.0729-.2383-.334-.4314-.5826-.4314h-1.6636l.2005.6391c-.2407.4854-1.4886 2.38-6.3027 2.38-4.6003 0-5.8288-1.73-6.1107-2.3072z"/></svg>
                    <span>Detail Movie</span>
                </a>
            </div>
            {{-- End title  --}}
        </div>
        {{-- End image section --}}
        @endforeach

        {{-- prev Button --}}
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1/12 flex justify-center" onclick="moveSlide(-1)">
            <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 dur">
                <svg width='24' height='24' enable-background="new 0 0 32 32" id="Слой_1" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M11.262,16.714l9.002,8.999  c0.395,0.394,1.035,0.394,1.431,0c0.395-0.394,0.395-1.034,0-1.428L13.407,16l8.287-8.285c0.395-0.394,0.395-1.034,0-1.429  c-0.395-0.394-1.036-0.394-1.431,0l-9.002,8.999C10.872,15.675,10.872,16.325,11.262,16.714z" fill="#121313" fill-rule="evenodd" id="Chevron_Right"></path><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </button>
        </div>
        {{-- End prev button --}}   

        {{-- next Button --}}
        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-1/12 flex justify-center" onclick="moveSlide(+1)">
            <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 dur">
                <svg width='24' height='24' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
        </div>
        {{-- End next button --}}

            {{-- Indicator Image section --}}
<div class="absolute bottom-0 w-full mb-8">
    <div class="w-full flex flex-row items-center justify-center">
        <div class="w-2.5 h-2.5 rounded-full dot mx-1 cursor-pointer bg-white"></div>
        <div class="w-2.5 h-2.5 rounded-full dot mx-1 cursor-pointer bg-develobe-900"></div>
        <div class="w-2.5 h-2.5 rounded-full dot mx-1 cursor-pointer bg-white"></div>
    </div>
</div>
    {{-- End Image section --}}
    </div>


    {{-- End banner section --}}
</div>

{{-- Script --}}
<script>
let slideIndex = 3;
slideShow(slideIndex);

//Move prev button
function moveSlide(movestep) {
    slideShow(slideIndex += movestep);
}

    function slideShow(position) {
        
        let index;
        const slides = document.getElementsByClassName("slide");

        //Looping effect
        if(position > slides.length) {slideIndex = 1} 
        if(position < 1) {slideIndex = slides.length } 

        // Hide all slide
        for(index = 0; index < slides.length; index++) {
            slides[index].classList.add('hidden');
        }

        //show slide active
        slides[slideIndex - 1].classList.remove('hidden');

        
    }
</script>
</body>
</html>