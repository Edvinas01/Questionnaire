<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_577def8f234c51f8002b7c9ddd65efd19ba411c98a3a1f7d789d18d6a951a205 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8d6889610f6a2eae9217195be563acfb57254c4365af77aeb7c572fd29a7a4cc = $this->env->getExtension("native_profiler");
        $__internal_8d6889610f6a2eae9217195be563acfb57254c4365af77aeb7c572fd29a7a4cc->enter($__internal_8d6889610f6a2eae9217195be563acfb57254c4365af77aeb7c572fd29a7a4cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8d6889610f6a2eae9217195be563acfb57254c4365af77aeb7c572fd29a7a4cc->leave($__internal_8d6889610f6a2eae9217195be563acfb57254c4365af77aeb7c572fd29a7a4cc_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_d86b48887663ebe33bf899cfcdfd82f0386cc88e65d36162a460c55808ba7c72 = $this->env->getExtension("native_profiler");
        $__internal_d86b48887663ebe33bf899cfcdfd82f0386cc88e65d36162a460c55808ba7c72->enter($__internal_d86b48887663ebe33bf899cfcdfd82f0386cc88e65d36162a460c55808ba7c72_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_d86b48887663ebe33bf899cfcdfd82f0386cc88e65d36162a460c55808ba7c72->leave($__internal_d86b48887663ebe33bf899cfcdfd82f0386cc88e65d36162a460c55808ba7c72_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_fff9fd605f410258b9354196c8e5671bfefcb364a2772cda606a80c81151ab27 = $this->env->getExtension("native_profiler");
        $__internal_fff9fd605f410258b9354196c8e5671bfefcb364a2772cda606a80c81151ab27->enter($__internal_fff9fd605f410258b9354196c8e5671bfefcb364a2772cda606a80c81151ab27_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_fff9fd605f410258b9354196c8e5671bfefcb364a2772cda606a80c81151ab27->leave($__internal_fff9fd605f410258b9354196c8e5671bfefcb364a2772cda606a80c81151ab27_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_0bd1a3974d0d25c0be7c43578ab13f23a60c6c97b28799c9262a0671de228dc8 = $this->env->getExtension("native_profiler");
        $__internal_0bd1a3974d0d25c0be7c43578ab13f23a60c6c97b28799c9262a0671de228dc8->enter($__internal_0bd1a3974d0d25c0be7c43578ab13f23a60c6c97b28799c9262a0671de228dc8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_0bd1a3974d0d25c0be7c43578ab13f23a60c6c97b28799c9262a0671de228dc8->leave($__internal_0bd1a3974d0d25c0be7c43578ab13f23a60c6c97b28799c9262a0671de228dc8_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
