<script>
    let { content = "", label = "Copier", children } = $props();
    let copied = $state(false);

    async function copyToClipboard() {
        if (!content) return;
        try {
            await navigator.clipboard.writeText(content);
            copied = true;
            setTimeout(() => (copied = false), 2000);
        } catch (err) {
            console.error("Erreur de copie :", err);
        }
    }
</script>

<div class="copy-container">
    <button
        class="copy-btn"
        class:success={copied}
        onclick={copyToClipboard}
        type="button"
    >
        {copied ? "Copié !" : label}
    </button>

    <div class="copy-content">
        {#if children}
            {@render children()}
        {:else}
            <pre><code>{content}</code></pre>
        {/if}
    </div>
</div>