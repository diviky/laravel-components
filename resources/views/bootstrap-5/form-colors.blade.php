@props([
    'extraAttributes' => [],
    'colors' => [
        'blue' => '<span class="badge bg-blue">blue</span>',
        'azure' => '<span class="badge bg-azure">azure</span>',
        'primary' => '<span class="badge bg-primary">primary</span>',
        'indigo' => '<span class="badge bg-indigo">indigo</span>',
        'purple' => '<span class="badge bg-purple">purple</span>',
        'orange' => '<span class="badge bg-orange">orange</span>',
        'pink' => '<span class="badge bg-pink">pink</span>',
        'yellow' => '<span class="badge bg-yellow">yellow</span>',
        'red' => '<span class="badge bg-red">red</span>',
        'lime' => '<span class="badge bg-lime">lime</span>',
        'green' => '<span class="badge bg-green">green</span>',
        'teal' => '<span class="badge bg-teal">teal</span>',
        'cyan' => '<span class="badge bg-cyan">cyan</span>',
        'facebook' => '<span class="badge bg-facebook">facebook</span>',
        'twitter' => '<span class="badge bg-twitter">twitter</span>',
        'linkedin' => '<span class="badge bg-linkedin">linkedin</span>',
        'google' => '<span class="badge bg-google">google</span>',
        'youtube' => '<span class="badge bg-youtube">youtube</span>',
        'vimeo' => '<span class="badge bg-vimeo">vimeo</span>',
        'dribbble' => '<span class="badge bg-dribbble">dribbble</span>',
        'github' => '<span class="badge bg-github">github</span>',
        'instagram' => '<span class="badge bg-instagram">instagram</span>',
    ],
])

<x-form-choices :extra-attributes="$extraAttributes" :attributes="$attributes" :options="$colors">
    <x-slot:help>{{ $help ?? '' }}</x-slot:help>
</x-form-choices>
