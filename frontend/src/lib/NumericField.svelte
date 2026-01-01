<script>
let {field_name, label, value = $bindable(), key} = $props()

const decrement = () => value = Math.max(value - 1, 1);
const increment = () => value = Math.min(value + 1, 10);
const handleInput = (e) => {
    let val = parseInt(e.target.value.replace(/\D/g, ''), 10);
    if (isNaN(val)) val = 1;
    value = Math.min(Math.max(val, 1), 10);
}
</script>

<div class="numeric-field">
    <label class="text" for={'numeric-' + key}>{label}</label>
    <span class="field">
        <button type="button" onclick={(e) => { e.preventDefault(); decrement(); }}>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 640 640">
                <path d="M160 96C124.7 96 96 124.7 96 160L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 160C544 124.7 515.3 96 480 96L160 96zM232 296L408 296C421.3 296 432 306.7 432 320C432 333.3 421.3 344 408 344L232 344C218.7 344 208 333.3 208 320C208 306.7 218.7 296 232 296z"/>
            </svg>
        </button>

        <input type="text" name={field_name} maxlength="2" id={'numeric-' + key} bind:value oninput={handleInput} />

        <button type="button" onclick={(e) => { e.preventDefault(); increment(); }}>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 640 640">
                <path d="M160 96C124.7 96 96 124.7 96 160L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 160C544 124.7 515.3 96 480 96L160 96zM296 408L296 344L232 344C218.7 344 208 333.3 208 320C208 306.7 218.7 296 232 296L296 296L296 232C296 218.7 306.7 208 320 208C333.3 208 344 218.7 344 232L344 296L408 296C421.3 296 432 306.7 432 320C432 333.3 421.3 344 408 344L344 344L344 408C344 421.3 333.3 432 320 432C306.7 432 296 421.3 296 408z"/>
            </svg>
        </button>
    </span>
</div>