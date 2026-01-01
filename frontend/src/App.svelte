<script>
import {onMount} from 'svelte'
import CopyBlock from './lib/CopyBlock.svelte'
import Header from "./lib/Header.svelte"
import NumericField from "./lib/NumericField.svelte"
import CheckboxField from './lib/CheckboxField.svelte'
import Footer from './lib/Footer.svelte'


let sentenceMin = $state(5)
let sentenceMax = $state(10)
let paragraph = $state(5)
let html = $state(false)

let result = $state(null)
let loading = $state(false)

let base_url = window.location.host.includes('localhost') ? 'http://localhost:5000' : 'https://rb-webstudio.go.yj.fr/chuck-norris-ipsum'

const fetchData = async () => {
    loading = true
    try {
        const url = `${base_url}/api/?sentence_min=${sentenceMin}&sentence_max=${sentenceMax}&paragraph=${paragraph}&html_text=${html ? 1 : 0}`
        const response = await fetch(url)
        const data = await response.json()
        result = data // On met à jour la rune de résultat
    } catch (error) {
        console.error("Erreur fetch:", error)
    } finally {
        loading = false
    }
}

$effect(() => {
    const min = sentenceMin
    const max = sentenceMax

    if (min > max) {
        sentenceMax = min
    }
    if (max < min) {
        sentenceMin = max
    }
})
fetchData()
</script>

<Header />
<main class="container">
    <section>
        <h2>Générateur de Chuck Norris Facts</h2>
        {#if loading}
            <p>Chargement...</p>
        {:else if result}
            <CopyBlock content={result.rows.join('\n')} label="Tout Copier">
                <div class="api-content">
                    {#each result.rows as row}
                        <p>{row}</p>
                    {/each}
                </div>
            </CopyBlock>
        {/if}
    </section>
    <aside>
        <form onsubmit={e =>{e.preventDefault(); fetchData()}}>
            <NumericField field_name="sentence_min" label="Phrase minimum" bind:value={sentenceMin} key="1" />
            <NumericField field_name="sentence_max" label="Phrase maximum" bind:value={sentenceMax} key="2" />
            <NumericField field_name="paragraph" label="Paragraphe" bind:value={paragraph} key="3" />
            <CheckboxField field_name="html_text" label="élément &lt;p&gt;" bind:value={html} />
            <button type="submit">{loading ? 'Chargement...' : 'Générer'}</button>
        </form>
    </aside>
</main>
<Footer />