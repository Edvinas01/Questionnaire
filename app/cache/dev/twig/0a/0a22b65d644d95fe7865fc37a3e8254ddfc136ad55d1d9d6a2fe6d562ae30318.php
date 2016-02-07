<?php

/* authentication/register.html.twig */
class __TwigTemplate_d82e8fc5f4cdb4afe45ef8d6ec94baa97c5994a00690f87c91635a3e86207f47 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/includes.html.twig", "authentication/register.html.twig", 1);
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
        $__internal_7e25f4c053bc93ef398477b50315d2ba0892f355edf9a1a175b1bb1754788599 = $this->env->getExtension("native_profiler");
        $__internal_7e25f4c053bc93ef398477b50315d2ba0892f355edf9a1a175b1bb1754788599->enter($__internal_7e25f4c053bc93ef398477b50315d2ba0892f355edf9a1a175b1bb1754788599_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "authentication/register.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7e25f4c053bc93ef398477b50315d2ba0892f355edf9a1a175b1bb1754788599->leave($__internal_7e25f4c053bc93ef398477b50315d2ba0892f355edf9a1a175b1bb1754788599_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_b2a5d1886148c500e21dda28f282ac8ef364915acab79dfc65b9373d6dbaf1ad = $this->env->getExtension("native_profiler");
        $__internal_b2a5d1886148c500e21dda28f282ac8ef364915acab79dfc65b9373d6dbaf1ad->enter($__internal_b2a5d1886148c500e21dda28f282ac8ef364915acab79dfc65b9373d6dbaf1ad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"col-md-4 col-md-offset-4\">
        ";
        // line 5
        $this->loadTemplate("authentication/register.form.html.twig", "authentication/register.html.twig", 5)->display($context);
        // line 6
        echo "    </div>
";
        
        $__internal_b2a5d1886148c500e21dda28f282ac8ef364915acab79dfc65b9373d6dbaf1ad->leave($__internal_b2a5d1886148c500e21dda28f282ac8ef364915acab79dfc65b9373d6dbaf1ad_prof);

    }

    public function getTemplateName()
    {
        return "authentication/register.html.twig";
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
/*         {% include 'authentication/register.form.html.twig' %}*/
/*     </div>*/
/* {% endblock %}*/
