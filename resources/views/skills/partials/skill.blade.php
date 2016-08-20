<div @if(Auth::check() && Auth::user()->isAdmin()) data-skill="{{ $skill->id }}"
     @endif class="skill col-xs-12 col-sm-6 col-md-4 col-lg-3">
    @if(Auth::check() && Auth::user()->isAdmin())
        <div class="pull-right">
            <a href="{{ action('SkillsController@edit', $skill->id) }}" class="icon icon-pencil"></a>
            <a onClick="deleteSkill({{ $skill->id }});" class="icon icon-close text-danger"></a>
        </div>
    @endif
    <div class="radial-progress" data-progress="{{ $skill->percentage }}">
        <div class="circle">
            <div class="mask full">
                <div class="fill"></div>
            </div>
            <div class="mask half">
                <div class="fill"></div>
                <div class="fill fix"></div>
            </div>
        </div>
        <div class="inset">
            <div class="percentage">
                <div class="numbers"><span>{{ $skill->name }}</span></div>
            </div>
        </div>
    </div>
</div>