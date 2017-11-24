<h2 class="page-header text-center">{{ $category->name }}</h2>
<ul class="tags">
    @each('skills.partials.skill', $category->skills, 'skill')
</ul>
<div class="clearfix"></div>