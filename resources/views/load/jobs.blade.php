<div class="d-flex flex-row flex-wrap" style="width:100%">
    <div class="col-md-12">
            <div class="float-right">
                {{ $jobs->render() }}
            </div>
        </div>
    @foreach ($jobs as $job)
    <div class="col-md-6 mb-1">
        <div class="card shadow-sm border-{{$job->type->class}} cpanel">
            <a href="#" class="card-header bg-{{$job->type->class}} text-white text-center" data-slug="{{ $job->slug }}" data-token="{{csrf_token()}}" id="job-view-{{ $job->slug }}">
                <strong>{{ $job->title }}  </strong>
            </a>
            <div class="card-body">
                <h5 class="card-title text-center">
                    <small>at</small> {{ $job->company['name'] }}
                    <small>in</small> {{ $job->city->name }}
                </h5>
                <div class="text-center">
                    <i class="fa fa-clock"></i> {{ $job->created_at->diffForHumans() }} <span class="text-{{ $job->type->class }}">{{ ($job->source['name'] != "") ? 'at '.$job->source['name'] : "" }}</span> </small> 
                </div>
            </div>
            <div class="card-footer bg-{{$job->type->class}} text-center text-white pl-1 p-0">
                <small class="float-left mt-1">{{$job->type->name}}</small>
                <small class="">{{$job->category->name}}</small>
                <a href="javascript:void(0)" class="btn btn-sm btn-{{$job->type->class}} float-right" data-slug="{{ $job->slug }}" data-token="{{csrf_token()}}" id="job-view-{{ $job->slug }}">View</a>
            </div>
        </div>
    </div>
    <hr>
    @endforeach
    <div class="col-md-12">
        <div class="float-right">
            {{ $jobs->render() }}
        </div>
    </div>
</div>