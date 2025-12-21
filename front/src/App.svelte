<script>
  import { onMount } from "svelte";
  let lenSentenceMin = 0;
  let lenSentenceMax = 0;
  let lenParagraph = 0;

  onMount(() => {
    console.log(window.location.search);
    if (window.location.search !== "") {
      const urlParams = new URLSearchParams(window.location.search);
      lenSentenceMin = urlParams.get("sentence_min");
      lenSentenceMax = urlParams.get("sentence_max");
      lenParagraph = urlParams.get("paragraph");
    }
  });
  let onChangeSentenceMin = (e) => {
    let val = parseInt(e.target.value, 10);
    if (val >= lenSentenceMax) {
      lenSentenceMax = val < 100 ? val + 1 : 100;
    }
  };
  let onChangeSentenceMax = (e) => {
    let val = parseInt(e.target.value, 10);
    if (val <= lenSentenceMin) {
      lenSentenceMin = val > 0 ? val - 1 : 0;
    }
  };
</script>

<form>
  <fieldset class="fieldset">
    <legend>chuck ipsum</legend>
    <div class="grid-x grid-padding-x">
      <div class="cell medium-2">
        <label>
          <span>phrase min.</span>
          <input
            tabindex="0"
            type="range"
            min="0"
            max="100"
            bind:value={lenSentenceMin}
            on:change={onChangeSentenceMin}
          />
          <input
            tabindex="1"
            type="number"
            bind:value={lenSentenceMin}
            name="sentence_min"
            on:input={onChangeSentenceMin}
          />
        </label>
      </div>
      <div class="cell medium-2">
        <label>
          <span>phrase max.</span>
          <input
            tabindex="0"
            type="range"
            min="0"
            max="100"
            bind:value={lenSentenceMax}
            on:change={onChangeSentenceMax}
          />
          <input
            tabindex="1"
            type="number"
            bind:value={lenSentenceMax}
            name="sentence_max"
            on:input={onChangeSentenceMax}
          />
        </label>
      </div>
      <div class="cell medium-4">
        <label>
          <span>nbe paragraphe</span>
          <input
            tabindex="0"
            type="range"
            min="0"
            max="100"
            bind:value={lenParagraph}
          />
          <input
            tabindex="1"
            type="number"
            bind:value={lenParagraph}
            name="paragraph"
          />
        </label>
      </div>
      <div class="cell medium-4">
        <button tabindex="1" type="submit" class="button expanded"
          >envoyer</button
        >
      </div>
    </div>
  </fieldset>
</form>

<style>
  span {
    display: block;
  }
  input[type="range"] {
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
  input[type="range"]::-webkit-slider-runnable-track {
    height: 8px;
    width: 100%;
    border: none;
    border-radius: 0;
    background-color: #e6e6e6; /* supprimé définie sur l'input */
  }
  /* le curseur */
  input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 15px;
    height: 15px;
    border: none;
    border-radius: 0;
    background: #1779ba;
    transform: translateY(-4px);
  }
  /* ff */
  /* la zone de déplacement */
  input[type="range"]::-moz-range-track {
    height: 8px;
    border: none;
    border-radius: 0;
    background-color: #e6e6e6; /* supprimé définie sur l'input */
  }
  /* le curseur */
  input[type="range"]::-moz-range-thumb {
    width: 15px;
    height: 15px;
    border: none; /* supprimer la bordure */
    border-radius: 0; /* supprimer le rayon */
    background: #1779ba;
  }
  /* barre progression avant */
  input[type="range"]::-moz-range-progress {
    height: 8px;
    background: transparent; /* supprime barre progression avant */
  }
  button {
    margin: 25px 0;
    height: calc(100% - 40px);
  }
</style>
