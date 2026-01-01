<script>
    import { scale, fade } from 'svelte/transition'
    import { cubicOut } from 'svelte/easing'

    let { show = $bindable(), title, children } = $props()

    function close() {
        show = false
    }
</script>

{#if show}
    <div class="backdrop" transition:fade onclick={close}>
        <div class="modal-content" transition:scale={{ duration: 200, start: 0.8, easing: cubicOut }} onclick={(e) => e.stopPropagation()}>
            <div class="header">
              <h2>{title}</h2>
                <button class="close-btn" onclick={close}>&times;</button>
            </div>

            <div class="body">
                {@render children()}
            </div>
        </div>
    </div>
{/if}