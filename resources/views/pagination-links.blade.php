@if($paginator->hasPages())
<ul class="flex justify-between">
    <li wire:click='previousPage' class="cursor-pointer">Prev</li>
    <li wire:click='nextPage' class="cursor-pointer">Next</li>
</ul>
@endif