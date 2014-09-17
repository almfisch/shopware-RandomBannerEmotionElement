<div class="slider_banner_{$Data.objectId} banner-slider-emotion" style="height:{$sElementHeight}px">
	{if $banner.link}
    	<a href="{$Data.random_banner.link}"><img src="{$Data.random_banner.path}" alt="{$Data.random_banner.altText}" {if $Data.random_banner.title}title="{$Data.random_banner.title}" {/if}/></a>
    {else}
    	<img src="{$Data.random_banner.path}" alt="{$Data.random_banner.altText}" {if $Data.random_banner.title}title="{$Data.random_banner.title}" {/if}/>
    {/if}
</div>
