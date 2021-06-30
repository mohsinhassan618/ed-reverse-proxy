<?php

global $wpdb;
add_thickbox();
?>
<div class="wrap">
    <div id="icon-options-general" class="icon32"></div>
    <h1><?php echo __("Reverse Proxy Domains", $this->plugin_name); ?></h1>
    <br />
    <?php
		$proxy_domains = get_option("proxy_domains");
    ?>
        <a href="#TB_inline?width=500&height=450&inlineId=modal-window-id" class="thickbox rp-domain-btn button button-primary button-large" title="<?php echo __("Add New Domain", $this->plugin_name); ?>">Add Proxy Domain</a>

        <!-- Now we can render the completed list table -->
        <table class="widefat fixed" cellspacing="0" style="padding: 20px;">
            <thead>
            <tr>
                <th id="columnname" class="manage-column column-columnname" scope="col">Domain Name</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Domain IP</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Action</th>

            </tr>
            </thead>

            <tfoot>
            <tr>
                <th id="columnname" class="manage-column column-columnname" scope="col">Domain Name</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Domain IP</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Action</th>

            </tr>
            </tfoot>

            <tbody>
            <?php
            if(!empty($proxy_domains)){
                $count= 1;
                foreach($proxy_domains as $key => $domains){ ?>
                    <tr class="alternate">
                        <th class="check-column" scope="row"><?php echo $proxy_domains[$key]['domain']; ?></th>
                        <th class="check-column" scope="row"><?php echo $proxy_domains[$key]['ip']; ?></th>
                        <td class="column-columnname">
                            <p><a href="#" class="rp-remove-it" data-domain="<?php echo $key; ?>">Remove</a></p>
                            <p><a href="#TB_inline?width=500&height=450&inlineId=modal-window-edit-<?php echo $count; ?>" class="thickbox" data-domain="<?php echo $key; ?>" >Edit</a></p>
                        </td>
                    </tr>
                    <?php
                    $count++;
                }
            } else {
                echo '<tr class="no-items"><td class="colspanchange" colspan="2">'. __('No Record found.', $this->plugin_name) .'</td></tr>';
            }
            ?>
            </tbody>
        </table>
    <div id="modal-window-id" style="display:none;">
        <div class="rp_content_addition">
			<br />
			<label for="domain_name"><?php echo __("Enter Domain URL", $this->plugin_name); ?></label><br />
			<input type="text" name="domain_name" class="regular-text" placeholder="Domain URL" required="required"/><br /><br />
			<label for="domain_name"><?php echo __("Enter IP's", $this->plugin_name); ?></label><br />
			<textarea name="domain_ip" class="regular-text" placeholder="IP" required="required" style=" height: 100px; "></textarea><br />
			<?php submit_button("Add Proxy Domain"); ?>
			<div class="spinner"></div>
        </div>
    </div>
    <?php
    $count=1;
    foreach ($proxy_domains as  $key => $domain): ?>
    <div id="modal-window-edit-<?php echo $count; ?>" style="display:none;">
        <div class="rp_content_edit">
            <br />
            <label for="domain_name"><?php echo __("Enter Domain URL", $this->plugin_name); ?></label><br />
            <input id="domain_url" type="text" name="domain_name_<?php echo $count; ?>" class="regular-text" placeholder="Domain URL" value="<?php echo $proxy_domains[$key]['domain']; ?>" required="required" /><br /><br />
            <label for="domain_name"><?php echo __("Enter IP's", $this->plugin_name); ?></label><br />
            <textarea name="domain_ip_<?php echo $count; ?>" class="regular-text" placeholder="IP" required="required" style=" height: 100px; "><?php echo trim($proxy_domains[$key]['ip']); ?></textarea><br />
            <input id="submit_edit" type="submit" class="button button-primary" value="Update Proxy Domain" data-count="<?php echo $count; ?>" >
            <div class="spinner"></div>
        </div>
    </div>
    <?php
    $count++;
    endforeach;
    ?>
</div>
