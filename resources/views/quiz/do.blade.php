@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Your Quiz To People') }}</div>
    
                    <div class="card-body">
                        <form id="form" action="{{ url("/result/quiz/{$data[0]->id_quiz}") }}" method="post">
                            @csrf
                            <?php $i = 0; ?>
                            @foreach ($data as $item)
                            <div >
                                <?php $i++; ?>
                                <div class="m-4">
                                    <span class="p-3 rounded-pill alert-info">Question: {{ $i }} / {{ $count }}</span> 
                                </div>
                                <input type="hidden" name="id_{{$i}}" value={{ $item->id }}>
                                <div class="p-4 rounded alert-primary">
                                    {{ $item->question }}
                                </div>
                                <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_1">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_1)">
                                        <div class="btn btn-outline-secondary"><i class="fal fa-check sidebar-icon"></i></div>
                                    </div>
                                    <div class="m-2 border-bottom">{{ $item->ans_1 }}</div>     
                                </div>
                                <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_2">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_2)">
                                        <div class="btn btn-outline-secondary"><i class="fal fa-check sidebar-icon"></i></div>
                                    </div>
                                    <div class="m-2 border-bottom">{{ $item->ans_2 }}</div>  
                                </div>
                                <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_3">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_3)">
                                        <div class="btn btn-outline-secondary"><i class="fal fa-check sidebar-icon"></i></div>
                                    </div>
                                    <div class="m-2 border-bottom">{{ $item->ans_3 }}</div>  
                                </div>
                                <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_4">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_4)">
                                        <div class="btn btn-outline-secondary"><i class="fal fa-check sidebar-icon"></i></div>
                                    </div>
                                    <div class="m-2 border-bottom">{{ $item->ans_4 }}</div>  
                                </div>
                                <input type="hidden" name="ques_{{$i}}true_ans" id="ques_{{$i}}true_ans" value="{{ $item->true_ans }}">
                                
                            </div>
                            @endforeach
                            <div class="text-center mt-5">
                                    <div class="btn btn-primary" onclick="if (confirm('Check carefully! Are your sure?')) document.getElementById('form').submit()">SAVE</div>                         
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    for(i=1; i <= {{ $count }} ; i++){
        ans = document.getElementById("ques_"+i+"true_ans").value
        document.getElementsByName(ans)[0].classList.add('alert-success')
    }
</script>
@endsection