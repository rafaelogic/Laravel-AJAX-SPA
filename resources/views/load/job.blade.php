<div class="d-flex flex-column flex-wrap" style="width: 100%;">
  <div class="bg-dark text-white text-center">
      <h5 class="bg-{{$job->type->class}} mt-2">{{$job->type->name}}</h5>
      <h1>{{$job->title}}</h1>
      <h3>{{$job->company->name}}</h3>
      <h5 class="bg-{{$job->type->class}} text-white">{{$job->city->name}} | {{$job->category->name}} | Viewed: {{$job->views}} {{$job->views > 1 ? 'times':'time'}}</h5>
  </div>

  <div class="container">
      @if ( $job->company->about != "" || $job->description != "")
      <div class="col-md-12">
        <div class="row">
            <h3 class="text-{{ $job->type->class }}">Overview</h3>
        </div>
      </div>
      {!! $job->company->about !!}
      {!! $job->description !!}
    @endif
      
    @if ($job->qualifications != "")
      <br>
      <div class="col-md-12">
        <div class="row">
          <h3 class="text-{{ $job->type->class }}">Qualifications</h3>
        </div>
      </div>
      {!! $job->qualifications !!}
    @endif
        
    @if ($job->responsibilities != "")
      <br><br>
      <div class="col-md-12">
        <div class="row">
          <h3 class="text-{{ $job->type->class }}">Responsibilities</h3>
        </div>
      </div>
      {!! $job->responsibilities !!}
    @endif
  </div>
</div>