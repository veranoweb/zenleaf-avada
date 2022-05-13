<?php

/**
 * Template Name: State Deals > AZ
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

?>


<div class="w-full">
    <div class="mx-auto">

    <section id="hero" className="">
          <div className="mx-auto max-w-7xl relative">
            <div className="px-4 lg:px-none md:h-[375px] lg:h-[500px] mt-4  flex flex-col md:block">
              <div className="text-left lg:max-w-2xl bg-white bg-opacity-80 px-4 py-8 md:px-12 lg:p-16 rounded md:absolute md:top-1/2 md:-translate-y-1/2 z-20 backdrop-blur-lg ">
                <h1 className="mt-1 text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900  capitalize block font-subheading lg:max-w-sm ">
                  Cannabis Deals in Arizona
                </h1>
                <p className="mt-5 text-lg lg:text-xl text-gray-500 block mb-6 max-w-sm">
                  Consider this your guide to the best cannabis deals in the
                  state of Arizona.
                </p>
                <Link href="/shop/az">
                  <a className="bg-moss-green  px-12 py-2 rounded text-white tracking-widest hover:bg-moss-green-dark hover:no-underline border-2 border-moss-green transition-all duration-100 inline-block hover:text-white hover:shadow-xl uppercase">
                    Shop Now
                  </a>
                </Link>
              </div>
              <div className="bg-black md:absolute z-10 right-0 md:h-[375px] md:w-[675px] lg:h-[500px] lg:w-[900px] rounded">
                <Image
                  src="https://admin.zenleafdispensaries.com/wp-content/uploads/2022/04/az-deals-header.jpg"
                  width={900}
                  height={500}
                  className="rounded"
                />
              </div>
            </div>
          </div>
        </section>

        <section id="infoBlock-imageRight">
          <div className="container mx-auto py-20">
            <div className="lg:text-center max-w-3xl mx-auto">
              <h2 className="tracking-widest">Arizona Marijuana Deals</h2>
              <p className="">
                If you’re looking to save on the best cannabis products in the
                state, you’ve come to the right place. Take a look at our week
                of marijuana deals, available statewide at Arizona Zen Leaf
                Dispensaries.
              </p>
            </div>
          </div>
        </section>



        <div id="stateSlug" data-slug="az"></div>
    <div id="dealsApp"></div>

<script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
<script src="https://zld-deals-az.netlify.app/index.js"></script>


    </div>
       
</div>


<?php
get_footer();
?>