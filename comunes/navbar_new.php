<script id="project-items-template" type="text/x-handlebars-template">
    {{#each projects}}
    <div class="{{ class }}" data-id="{{ id }}">
        <div class="project-item-container">
            <span class="menu_order">{{ menu_order }}</span>

            {{#if knowledge_project }}
            <a href="{{ permalink }}" {{#if external }}target="_blank"{{/if}} class="project-item-link project-item {{#if image }}bg-image{{/if}}" {{#if image }}data-image="{{ image }}"{{/if}}>
            <div class="description">
                <div class="description-container t1">
                    <span class="format">{{ knowledge_format }}</span>
                    {{#unless big_knowledge }}
                    <h2>{{{ title }}}</h2>
                    <div class="text">
                        <div class="front">{{{ knowledge_text }}}</div>
                        <div class="hover">{{{ knowledge_hover_text }}}</div>
                    </div>
                    {{/unless}}
                    {{#if big_knowledge }}
                    <h2>{{{ knowledge_text }}}</h2>
                    {{/if}}
                </div>
            </div>
            </a>
            {{/if}}
            {{#if regular_type }}
            <a href="{{ permalink }}" {{#if external }}target="_blank"{{/if}} class="project-item-link project-item bg-image" data-image="{{ image }}">
            <div class="description">
                <div class="description-container t2">
                    <h2>
                        {{{ title }}}
                        {{#if caption }}
                        <span class="caption">{{{ caption }}}</span><br/>
                        {{/if}}
                        {{#if subtitle }}
                        <span class="subtitle">{{{ subtitle }}}</span>
                        {{/if}}
                    </h2>
                </div>
            </div>
            </a>
            {{/if}}
            {{#if video_type }}
            <a href="{{ permalink }}" {{#if external }}target="_blank"{{/if}} class="project-item-link project-item bg-image with-video" data-image="{{ image }}">
            <div class="video-container" >
                <video class="lazy" preload="metadata" poster="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" width="{{ video_meta.width }}" height="{{ video_meta.height }}" muted loop>
                    <source src="{{ video_meta.url }}" type="{{ video_meta.mime }}">
                </video>
            </div>
            <div class="description">
                <div class="description-container t3">
                    <h2>
                        {{{ title }}}
                        {{#if caption }}
                        <span class="caption">{{{ caption }}}</span><br/>
                        {{/if}}
                        {{#if subtitle }}
                        <span class="subtitle">{{{ subtitle }}}</span>
                        {{/if}}
                    </h2>
                </div>
            </div>
            </a>
            {{/if}}
            {{#if gif_type }}
            <a href="{{ permalink }}" {{#if external }}target="_blank"{{/if}} class="project-item-link project-item bg-image" data-image="{{ gif_url }}" data-image-hi="{{ gif_url }}" data-image-ultra="{{ gif_url }}">
            <div class="description">
                <div class="description-container t4">
                    <h2>
                        {{{ title }}}
                        {{#if caption }}
                        <span class="caption">{{{ caption }}}</span><br/>
                        {{/if}}
                        {{#if subtitle }}
                        <span class="subtitle">{{{ subtitle }}}</span>
                        {{/if}}
                    </h2>
                </div>
            </div>
            </a>
            {{/if}}
            {{#if gallery_type }}
            <div class="project-item">
                <div class="item_slick">
                    {{#each gallery}}
                    <div class="slide">
                        <a href="{{ permalink}}" class="project-item-link bg-image" data-image="{{ image }}" {{#if external }}target="_blank"{{/if}}>
                        <div class="description">
                            <div class="description-container t5">
                                <h2>
                                    {{{ title }}}
                                    {{#if caption }}
                                    <span class="caption">{{{ caption }}}</span><br/>
                                    {{/if}}
                                    {{#if subtitle }}
                                    <span class="subtitle">{{{ subtitle }}}</span>
                                    {{/if}}
                                </h2>
                            </div>
                        </div>
                        </a>
                    </div>
                    {{/each}}
                </div>
            </div>
            {{/if}}
        </div>
    </div>
    {{/each}}        </script>

<header class="header" role="banner" id="header">
    <div class="header-container">
        <div class="logo-container header-cell">
            <a href="https://wearemucho.com" class="logo">
                <img src="https://wearemucho.com/wp-content/themes/mucho-updated/img/logo.svg" alt="Logo" class="logo-img">
            </a>
        </div>
        <div class="text-container header-cell">
            <span>We are a strategy, branding, packaging, and graphic design</span><span>studio. We create design with meaning from our locations</span><span>in Barcelona, Paris, San Francisco, New York and Sydney.</span><span>We’d love to hear from you at <a title="" href="mailto:info@wearemucho.com">info@wearemucho.com</a></span>            </div>
        <div class="menu-container header-cell">
            <div>
                <a href="#main-nav" class="toggle-main-nav"></a>
                <nav class="main-nav" id="main-nav" role="navigation">
                    <ul id="menu-main-menu" class="menu"><li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a href="https://wearemucho.com/work/">Work</a></li>
                        <li id="menu-item-4705" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4705"><a href="https://wearemucho.com/strategy/">Strategy</a></li>
                        <li id="menu-item-3200" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3200"><a href="https://wearemucho.com/sharing/">Sharing</a></li>
                        <li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a href="https://wearemucho.com/about/">About</a></li>
                        <li id="menu-item-5002" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5002"><a href="http://shop.wearemucho.com/">Shop</a></li>
                        <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13"><a href="https://wearemucho.com/contact/">Contact</a></li>
                    </ul>
                </nav>


                <nav class="mobile-nav" id="mobile-nav" role="navigation">
                    <ul id="menu-main-menu-1" class="menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a href="https://wearemucho.com/work/">Work</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4705"><a href="https://wearemucho.com/strategy/">Strategy</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3200"><a href="https://wearemucho.com/sharing/">Sharing</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a href="https://wearemucho.com/about/">About</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5002"><a href="http://shop.wearemucho.com/">Shop</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13"><a href="https://wearemucho.com/contact/">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div><!-- .menu-container -->
    </div>
</header>

