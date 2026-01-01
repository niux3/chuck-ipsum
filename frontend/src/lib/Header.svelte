<script>
    import Modal from "./Modal.svelte";
    import Illustration from './Illustration.svelte'
    import CopyBlock from "./CopyBlock.svelte";
    let isHelpOpen = $state(false);
</script>

<header>
    <div class="container">
        <h1>Chuck Norris <span>Ipsum</span></h1>
        <nav>
            <button on:click|preventDefault={() => (isHelpOpen = true)}> aide</button>
            <a href="https://rb-webstudio.go.yj.fr/#contact" target="_blank"> contact</a>
        </nav>
    </div>
</header>
<Illustration />
<Modal bind:show={isHelpOpen} title="Aide à l'utilisation">
    <h3>Comment utiliser le générateur</h3>
    <ul>
        <li>Choisissez le nombre de phrases minium par paragraphe.</li>
        <li>Choisissez le nombre de phrases maximum par paragraphe.</li>
        <li>Réglez le nombre de paragraphes total.</li>
        <li>Cochez "HTML" pour obtenir des balises &lt;p&gt;.</li>
        <li>Copier le texte générer via le bouton « copier »</li>
    </ul>
    <h4>Utilisation avec cURL</h4>
    <ol>
        <li>
            <p class="instruction">Format <strong>JSON</strong> (par défaut) :</p>
            <CopyBlock content='curl -s "https://rb-webstudio.go.yj.fr/chuck-norris-ipsum/api/?sentence_min=1&sentence_max=5&paragraph=2"' label="Copier">
                <pre><code>curl -s "http://localhost:5000/api/?sentence_min=1&amp;sentence_max=5&amp;paragraph=2"</code></pre>
            </CopyBlock>
        </li>
        <li>
            <p class="instruction">Format <strong>Texte brut</strong> (idéal pour <a href="https://linux.die.net/man/1/xclip" target="_blank">xclip</a>/scripts) :</p>
            <CopyBlock content='curl -s "https://rb-webstudio.go.yj.fr/chuck-norris-ipsum/api/?sentence_min=1&sentence_max=5&paragraph=2&text=1"' label="Copier">
                <pre><code>curl -s "http://localhost:5000/api/?sentence_min=1&amp;sentence_max=5&amp;paragraph=2&amp;text=1"</code></pre>
            </CopyBlock>
        </li>
    </ol>

    <p class="note">
        Note : Ajoutez <code>&amp;html_text=1</code> pour recevoir des balises HTML.
    </p>
    <p class="italic">
        «&nbsp;Chuck Norris ne demande pas d'aide, c'est l'aide qui a besoin de
        lui.&nbsp;»
    </p>
</Modal>