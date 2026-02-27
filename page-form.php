<?php
/**
 * Template Name: Form
 */
?>

<?php get_header(); ?>

<?php the_content(); ?>

<div class="terms-modal">
    <div class="terms-modal__overlay"></div>

    <div class="terms-modal__content">
        <div class="terms-modal__body">
            <p>Loading terms…</p>
        </div>

        <button type="button" class="accept-terms" disabled>
            I Have Read & Accepted the Terms
        </button>
    </div>
</div>

<script>
    
    document.addEventListener('DOMContentLoaded', () => {

        const modal     = document.querySelector('.terms-modal');
        const body      = modal?.querySelector('.terms-modal__body');
        const acceptBtn = modal?.querySelector('.accept-terms');
        const checkbox  = document.querySelector('.terms-consent-checkbox');

        if (!modal || !body || !acceptBtn || !checkbox) return;

        const TERMS_SLUG = 'terms-of-service';

        let termsLoaded   = false;
        let termsAccepted = false;

        const openModal  = () => modal.classList.add('active');
        const closeModal = () => modal.classList.remove('active');

        const loadTerms = async () => {
            if (termsLoaded) return;

            try {
                const res   = await fetch(`/wp-json/wp/v2/pages?slug=${TERMS_SLUG}`);
                const pages = await res.json();

                body.innerHTML = pages.length
                    ? pages[0].content.rendered
                    : '<p>Unable to load terms.</p>';

                termsLoaded = true;

                const requiresScroll = body.scrollHeight > body.clientHeight;

                if (!requiresScroll) {
                    acceptBtn.disabled = false;
                }

            } catch {
                body.innerHTML = '<p>Error loading terms.</p>';
                acceptBtn.disabled = false; // don't hard-block if fetch fails
            }
        };

        const handleCheckboxClick = (e) => {
            if (termsAccepted) return;

            e.preventDefault();
            openModal();
            loadTerms();
        };

        const handleScroll = () => {
            const nearBottom =
                body.scrollTop + body.clientHeight >= body.scrollHeight - 20;

            if (nearBottom) acceptBtn.disabled = false;
        };

        const handleAccept = () => {
            termsAccepted = true;
            checkbox.checked = true;
            checkbox.dispatchEvent(new Event('change', { bubbles: true }));
            closeModal();
        };

        // Initial state
        acceptBtn.disabled = true;

        // Events
        checkbox.addEventListener('click', handleCheckboxClick);
        body.addEventListener('scroll', handleScroll);
        acceptBtn.addEventListener('click', handleAccept);

    });
    
</script>

<?php get_footer(); ?>
