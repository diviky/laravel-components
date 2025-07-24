<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$attributes->get('id') ?: $id()" />

    <div class="pt-5 ms-3" x-data="{
        rating: {{ intval($value) }},
        current: {{ intval($value) }},
        size: {{ intval($rating) }},
        rate(star) {
            this.rating = star;
        }
    }">
        <template x-for="star in size" :key="star">
            @if ($icon == 'number')
                <span @click="rate(star)" @mouseover="current = star" @mouseleave="current = rating"
                    @class([
                        'rounded-xs text-gray-400 fill-current w-8 m-0 cursor-pointer' => true,
                        'badge h-5 me-1' => $icon == 'number',
                    ])
                    :class="{
                        'bg-primary text-white': current >= star,
                        'bg-primary': rating >= star && current >= star
                    }"
                    x-text="star">
                </span>
            @else
                <span @click="rate(star)" @mouseover="current = star" @mouseleave="current = rating"
                    @class([
                        'rounded-xs fill-current w-8 m-0 cursor-pointer' => true,
                    ])
                    :class="{
                        'text-primary': current >= star,
                        'text-primary': rating >= star && current >= star
                    }">
                    <x-icon name="{{ $icon }}" size="{{ $size }}" />
                </span>
            @endif
        </template>
        <input type="hidden" name="{{ $name }}" x-model="rating" />
    </div>
</div>
