<script>
    let lenSentence = 0
    let lenParagraph = 0
</script>
<form>
    <fieldset class="fieldset">
        <legend>chuck ipsum</legend>
        <div class="grid-x grid-padding-x">
            <div class="cell medium-4">
                <label>
                    <span>n° phrase</span>
                    <input type="range" min="0" max="100" bind:value={lenSentence}>
                    <input type="number" bind:value={lenSentence} name="sentence">
                </label>
            </div>
            <div class="cell medium-4">
                <label>
                    <span>n° paragraphe</span>
                    <input type="range" min="0" max="100" bind:value={lenParagraph}>
                    <input type="number" bind:value={lenParagraph} name="paragraphe">
                </label>
            </div>
            <div class="cell medium-4">
                <button type="submit" class="button expanded">envoyer</button>
            </div>
        </div>
    </fieldset>
</form>

<style>
    span {
        display: block;
    }
    input[type=range]{
        -webkit-appearance: none;
        padding: 0;
        font: inherit;
        outline: none;
        color: #1779ba;
        background: #e6e6e6;
        box-sizing: border-box;
        cursor: pointer;
        border-radius: 0;
        width: 100%;
    }
    /* chrome */
    input[type=range]::-webkit-slider-runnable-track {
        height: 8px;
        width: 100%;
        border: none;
        border-radius: 0;
        background-color: #e6e6e6;  /* supprimé définie sur l'input */
    }
    /* le curseur */
    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 15px;
        height: 15px;
        border: none;
        border-radius: 0;
        background: #1779ba;
        transform: translateY(-4px)
    }
    /* ff */
    /* la zone de déplacement */
    input[type=range]::-moz-range-track {
        height: 8px;
        border: none;
        border-radius: 0;
        background-color: #e6e6e6;  /* supprimé définie sur l'input */
    }
    /* le curseur */
    input[type=range]::-moz-range-thumb {
        width: 15px;
        height: 15px;
        border: none;                   /* supprimer la bordure */
        border-radius: 0;               /* supprimer le rayon */
        background: #1779ba;
    }
    /* barre progression avant */
    input[type=range]::-moz-range-progress {
        height: 8px;
        background: transparent;        /* supprime barre progression avant */
    }
    button{
        margin: 25px 0;
        height: calc(100% - 40px);
    }
</style>
