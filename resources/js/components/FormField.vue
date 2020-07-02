<template>
    <default-field :field="field" :errors="errors" :full-width-content="true">
        <template slot="field">
            <textarea
                :id="name"
                type="text"
                class="w-full form-control form-input form-input-bordered py-3 h-auto"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
                v-bind="extraAttributes"
                :dusk="field.attribute"
                @keypress="value = $event.target.value"
                @keyup="handleKeyup"
                @keydown="value = $event.target.value"
                @input="value = $event.target.value"
            />
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },

        handleKeyup(event) {
            this.value = event.target.value;
            Nova.$emit('field-update-' + this.field.latin, {
                value: event.target.value
            })
        },
    },
    computed: {
        defaultAttributes() {
            return {
                rows: this.field.rows,
                class: this.errorClasses,
                placeholder: this.field.name,
            }
        },

        extraAttributes() {
            const attrs = this.field.extraAttributes;

            return {
                ...this.defaultAttributes,
                ...attrs,
            }
        },

        name: function() {
            return this.field.name.replace(/[^a-z0-9]/g, function(s) {
                var c = s.charCodeAt(0);
                if (c == 32) return '-';
                if (c >= 65 && c <= 90) return '_' + s.toLowerCase();
                return '__' + ('000' + c.toString(16)).slice(-4);
            });
        },
        keyboardDirection: function () {
            console.log(this.field.status);
            if(this.field.status === 'enable'){
                return {
                    'direction': 'ltr',
                }
            }
            return {
                'direction': 'rtl',
            }
        }
    },
    mounted() {
        thaanaKeyboard.defaultKeyboard = this.field.type;
        thaanaKeyboard.setHandlerById(this.name, this.field.status);
        if(this.field.status === 'enable'){
            $('#' + this.name).css({'direction': 'rtl'})
        }else{
            $('#' + this.name).css({'direction': 'ltr'})
        }
    }
}
</script>
