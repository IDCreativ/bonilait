<?php
$fields = get_fields();
?>
<div class="top-footer no-footer">
<?php
    if (isset($fields['page_footer']['footer_call_to_action']) && $fields['page_footer']['footer_call_to_action'] !== "") {
        ?>
        <div class="footer-call-to-action">
            <a
				class="btn btn-secondary btn-lg text-light text-uppercase"
                href="<?php echo isset($fields['page_footer']['footer_call_to_action']['url']) ? $fields['page_footer']['footer_call_to_action']['url'] : ""; ?>"
                target="<?php echo isset($fields['page_footer']['footer_call_to_action']['target']) ? $fields['page_footer']['footer_call_to_action']['target'] : ""; ?>"
                title="<?php echo isset($fields['page_footer']['footer_call_to_action']['title']) ? $fields['page_footer']['footer_call_to_action']['title'] : ""; ?>"
            >
                <?php echo isset($fields['page_footer']['footer_call_to_action']['title']) ? $fields['page_footer']['footer_call_to_action']['title'] : ""; ?>
            </a>
        </div>
        <?php
    }
?>
</div>