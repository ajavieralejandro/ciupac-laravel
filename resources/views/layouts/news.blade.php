<div class=" z-30 relative items-center justify-center w-full h-full overflow-auto">
   

   <!-- Text Header -->
   <header class="w-full container mx-auto">
       <div class="flex flex-col items-center py-12">
           <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
               Minimal Blog
           </a>
           <p class="text-lg text-gray-600">
               Lorem Ipsum Dolor Sit Amet
           </p>
       </div>
   </header>

   


   <div class="container mx-auto flex flex-wrap py-6">

       <!-- Posts Section -->
       <section class="w-full md:w-2/3 flex flex-col items-center px-3">
         @foreach($posts as $post)
         <article class="flex flex-col shadow my-4">
               <!-- Article Image -->
               <a href="#" class="hover:opacity-75">
                   <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
               </a>
               <div class="bg-white flex flex-col justify-start p-6">
                   <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a>
                   <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</a>
                   <p href="#" class="text-sm pb-3">
                       By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on April 25th, 2020
                   </p>
                   <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
                   <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
               </div>
           </article>

         @endforeach

          

        

           <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/2 lg:w-1/3 px-4">
           <div class="max-w-[370px] mx-auto mb-10">
              <div class="rounded overflow-hidden mb-8">
                 <img
                    src="https://cdn.tailgrids.com/1.0/assets/images/blogs/blog-01/image-01.jpg"
                    alt="image"
                    class="w-full"
                    />
              </div>
              <div>
                 <span
                    class="
                    bg-primary
                    rounded
                    inline-block
                    text-center
                    py-1
                    px-4
                    text-xs
                    leading-loose
                    font-semibold
                    text-white
                    mb-5
                    "
                    >
                 Dec 22, 2023
                 </span>
                 <h3>
                    <a
                       href="javascript:void(0)"
                       class="
                       font-semibold
                       text-xl
                       sm:text-2xl
                       lg:text-xl
                       xl:text-2xl
                       mb-4
                       inline-block
                       text-dark
                       hover:text-primary
                       "
                       >
                    Meet AutoManage, the best AI management tools
                    </a>
                 </h3>
                 <p class="text-base text-body-color">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry.
                 </p>
              </div>
           </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/3 px-4">
           <div class="max-w-[370px] mx-auto mb-10">
              <div class="rounded overflow-hidden mb-8">
                 <img
                    src="https://cdn.tailgrids.com/1.0/assets/images/blogs/blog-01/image-02.jpg"
                    alt="image"
                    class="w-full"
                    />
              </div>
              <div>
                 <span
                    class="
                    bg-primary
                    rounded
                    inline-block
                    text-center
                    py-1
                    px-4
                    text-xs
                    leading-loose
                    font-semibold
                    text-white
                    mb-5
                    "
                    >
                 Mar 15, 2023
                 </span>
                 <h3>
                    <a
                       href="javascript:void(0)"
                       class="
                       font-semibold
                       text-xl
                       sm:text-2xl
                       lg:text-xl
                       xl:text-2xl
                       mb-4
                       inline-block
                       text-dark
                       hover:text-primary
                       "
                       >
                    How to earn more money as a wellness coach
                    </a>
                 </h3>
                 <p class="text-base text-body-color">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry.
                 </p>
              </div>
           </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/3 px-4">
           <div class="max-w-[370px] mx-auto mb-10">
              <div class="rounded overflow-hidden mb-8">
                 <img
                    src="https://cdn.tailgrids.com/1.0/assets/images/blogs/blog-01/image-03.jpg"
                    alt="image"
                    class="w-full"
                    />
              </div>
              <div>
                 <span
                    class="
                    bg-primary
                    rounded
                    inline-block
                    text-center
                    py-1
                    px-4
                    text-xs
                    leading-loose
                    font-semibold
                    text-white
                    mb-5
                    "
                    >
                 Jan 05, 2023
                 </span>
                 <h3>
                    <a
                       href="javascript:void(0)"
                       class="
                       font-semibold
                       text-xl
                       sm:text-2xl
                       lg:text-xl
                       xl:text-2xl
                       mb-4
                       inline-block
                       text-dark
                       hover:text-primary
                       "
                       >
                    The no-fuss guide to upselling and cross selling
                    </a>
                 </h3>
                 <p class="text-base text-body-color">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry.
                 </p>
              </div>
           </div>
        </div>
     </div>

       </section>