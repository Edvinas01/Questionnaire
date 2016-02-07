<?php

/* authentication/login.html.twig */
class __TwigTemplate_95e652f32bf7841d1fc47f631d8624d9ba03abfa7eb058c203dee07bad4ec790 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/includes.html.twig", "authentication/login.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/includes.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_af2744bae8c50865ccbd66ca5722faf54e129194154ecd9edd89dfce41aa6743 = $this->env->getExtension("native_profiler");
        $__internal_af2744bae8c50865ccbd66ca5722faf54e129194154ecd9edd89dfce41aa6743->enter($__internal_af2744bae8c50865ccbd66ca5722faf54e129194154ecd9edd89dfce41aa6743_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "authentication/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_af2744bae8c50865ccbd66ca5722faf54e129194154ecd9edd89dfce41aa6743->leave($__internal_af2744bae8c50865ccbd66ca5722faf54e129194154ecd9edd89dfce41aa6743_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_8520d4a3824d53ab1761599e7d52e5ab80e29b1dec77463e71a09dc1252541aa = $this->env->getExtension("native_profiler");
        $__internal_8520d4a3824d53ab1761599e7d52e5ab80e29b1dec77463e71a09dc1252541aa->enter($__internal_8520d4a3824d53ab1761599e7d52e5ab80e29b1dec77463e71a09dc1252541aa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"col-md-4 col-md-offset-4\">
        ";
        // line 5
        $this->loadTemplate("authentication/login.form.html.twig", "authentication/login.html.twig", 5)->display($context);
        // line 6
        echo "    </div>
";
        
        $__internal_8520d4a3824d53ab1761599e7d52e5ab80e29b1dec77463e71a09dc1252541aa->leave($__internal_8520d4a3824d53ab1761599e7d52e5ab80e29b1dec77463e71a09dc1252541aa_prof);

    }

    public function getTemplateName()
    {
        return "authentication/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 6,  43 => 5,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'layouts/includes.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div class="col-md-4 col-md-offset-4">*/
/*         {% include 'authentication/login.form.html.twig' %}*/
/*     </div>*/
/* {% endblock %}*/
