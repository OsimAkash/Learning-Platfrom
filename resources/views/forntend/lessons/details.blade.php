@extends('forntend.layout.forntend')


@section('content')
    <div class="page-header">

        <div class="container">
            <h1> {{ $lesson->title }} </h1>
        </div>
    </div>


    <div class="lesson-details">
        <div class="">
            <div class="row clearfix ">
                <div class="col-md-4">

                    <div class="course-left">

                        <h2 class="text-center"> {{ $course->title }} </h2>


                        <div class="course-lesson ">
                            <ol>
                                @foreach ($course->lessons as $lsn)
                                    <li class="@if ($lsn->id == $lesson->id) active-lesson @endif">
                                        <a href="{{ route('lessons.details', ['lesson' => $lsn->id, 'slug' => Str::slug($lsn->title)]) }}"
                                            class="nav-link  "> {{ $lsn->title }} </a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="lesson-content">

                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="   {{ $lesson->video_url }}     "
                                title="YouTube video" allowfullscreen></iframe>
                        </div>
                        <h1 class="mt-3"> {{ $lesson->title }} </h1>

                        <small> <b>Published at:</b> {{ $lesson->created_at }} </small>
                        <p class="mt-4"> {{ $lesson->description }} </p>
                    </div>



                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://e-learning-19.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by Disqus.</a></noscript>
                </div>
            </div>

        </div>
    </div>
@endsection
