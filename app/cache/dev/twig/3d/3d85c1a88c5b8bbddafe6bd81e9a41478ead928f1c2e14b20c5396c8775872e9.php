<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_aba3f5deefe8ff406924faa2ba9eaaa65001c713d88a8f5d94997655b7631ebf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ceffa3c61b63ebbe087994a193a5781183ab3d82360732354a5937b51a47fc01 = $this->env->getExtension("native_profiler");
        $__internal_ceffa3c61b63ebbe087994a193a5781183ab3d82360732354a5937b51a47fc01->enter($__internal_ceffa3c61b63ebbe087994a193a5781183ab3d82360732354a5937b51a47fc01_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ceffa3c61b63ebbe087994a193a5781183ab3d82360732354a5937b51a47fc01->leave($__internal_ceffa3c61b63ebbe087994a193a5781183ab3d82360732354a5937b51a47fc01_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_2745c12bd7d0e7d380f2ed1be778a5463029c47dee778e491968ab3ec6fc9a0b = $this->env->getExtension("native_profiler");
        $__internal_2745c12bd7d0e7d380f2ed1be778a5463029c47dee778e491968ab3ec6fc9a0b->enter($__internal_2745c12bd7d0e7d380f2ed1be778a5463029c47dee778e491968ab3ec6fc9a0b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_2745c12bd7d0e7d380f2ed1be778a5463029c47dee778e491968ab3ec6fc9a0b->leave($__internal_2745c12bd7d0e7d380f2ed1be778a5463029c47dee778e491968ab3ec6fc9a0b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_17c7308160137fbbcfad66dc92afd8a4e9a5e70bf0c1a6643c882e677ce5b1c6 = $this->env->getExtension("native_profiler");
        $__internal_17c7308160137fbbcfad66dc92afd8a4e9a5e70bf0c1a6643c882e677ce5b1c6->enter($__internal_17c7308160137fbbcfad66dc92afd8a4e9a5e70bf0c1a6643c882e677ce5b1c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_17c7308160137fbbcfad66dc92afd8a4e9a5e70bf0c1a6643c882e677ce5b1c6->leave($__internal_17c7308160137fbbcfad66dc92afd8a4e9a5e70bf0c1a6643c882e677ce5b1c6_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_b7fecbeeefcf3527d1b7091c6e039650d1060f4dedda15aca5bb1aab7602935e = $this->env->getExtension("native_profiler");
        $__internal_b7fecbeeefcf3527d1b7091c6e039650d1060f4dedda15aca5bb1aab7602935e->enter($__internal_b7fecbeeefcf3527d1b7091c6e039650d1060f4dedda15aca5bb1aab7602935e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_b7fecbeeefcf3527d1b7091c6e039650d1060f4dedda15aca5bb1aab7602935e->leave($__internal_b7fecbeeefcf3527d1b7091c6e039650d1060f4dedda15aca5bb1aab7602935e_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
