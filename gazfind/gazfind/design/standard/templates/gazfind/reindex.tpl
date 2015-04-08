<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">
    <h1>{'Reindex Content'|i18n('gazfind/reindex')}</h1>
    {if $error_list|count()|gt(0)}
        <ul>
        {foreach $error_list as $error}
            <li>{$error}</li>
        {/foreach}
        </ul>
    {/if}
    <form action={concat('gazfind/reindex/',$node.node_id)|ezurl()} method="POST">
        <table class="list">
            <tr>
                <th scope="col">{'Content'|i18n('gazfind/reindex')}</th>
                <th scope="col">{'Reindex'|i18n('gazfind/reindex')}</th>
            </tr>
            <tr class="bglight">
                <td width="30%">{$node.name|wash()} [{$node.class_name}]</td>
                <td width="70%"><input type="radio" name="gazfind_reindex_option" value="object" checked="checked"/></td>
            </tr>
        {if $$node.children_count > 0}
            <tr class="bgdark">
                <td width="30%">{$node.name|wash()} [{$node.class_name}] + All Children ({$node.children_count} Children) </td>
                <td width="70%"><input type="radio" name="gazfind_reindex_option" value="children"/></td>
            </tr>
        {/if}
        </table>
        {if $$node.children_count > 0}
            <p>Use the <strong>All Children</strong> option if you are re-indexing an object after changing <strong>priorities on child objects</strong></p>
        {/if}
        <div class="controlbar">
            <div class="block">
                <!-- not a button, but it actually works -->
                <a href="{$node.url_alias|ezurl('no')}" style="text-decoration: none;">&laquo; Go Back | </a>
                <input class="defaultbutton" type="submit" name="ReIndex" value="{'Reindex Content &raquo;'|i18n('gazfind/reindex')}"/>
            </div>
        </div>
    </form>
</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>

