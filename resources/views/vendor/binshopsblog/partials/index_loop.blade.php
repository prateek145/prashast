{{--Used on the index page (so shows a small summary--}}
{{--See the guide on binshops.com for how to copy these files to your /resources/views/ directory--}}



    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-auto d-none d-lg-block">
           {{-- {{dd($post->image_tag("medium", true, ''))}} --}} <!--Remove atag-->
            <?=$post->image_tag("medium", true, ''); ?>
          
        </div>
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis">{{$post->category_name}}ghjgjhg</strong> <!--NOT working-->
          <h3 class="mb-0">{{$post->title}}</h3>
          <div class="mb-1 text-body-secondary">{{$post->subtitle}}</div>
          
         
          
          <a href='{{$post->url($locale, $routeWithoutLocale)}}' class="icon-link gap-1 icon-link-hover stretched-link">
            Continue reading
            <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
          </a>
        </div>
        
      </div>
    </div>
    
  
