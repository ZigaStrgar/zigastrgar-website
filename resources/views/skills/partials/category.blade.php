<h2 class="page-header text-center">{{ $category->name }}</h2>
@each('skills.partials.skill', $category->skills, 'skill')
<div class="clearfix"></div>