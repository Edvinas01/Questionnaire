<?php

/* layouts/header.html.twig */
class __TwigTemplate_62c685e4ef36e4bcd40427b27d36ed29007bc4c7792a46478c568bbbbb0daf4d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_10bdbd630eb42bde5c0bf95e573bc9ba45c56ce29b0af14e1538ca02567cdbf4 = $this->env->getExtension("native_profiler");
        $__internal_10bdbd630eb42bde5c0bf95e573bc9ba45c56ce29b0af14e1538ca02567cdbf4->enter($__internal_10bdbd630eb42bde5c0bf95e573bc9ba45c56ce29b0af14e1538ca02567cdbf4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layouts/header.html.twig"));

        // line 1
        echo "<meta charset=\"utf-8\">
<meta name=\"description\" content=\"Questionnaire app\">
<meta name=\"author\" content=\"Edvinas\">

<title>Questionnaires</title>

<link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/site/img/favicon-96x96.png"), "html", null, true);
        echo "\" rel=\"icon\" type=\"image/x-icon\" sizes=\"192x192\"/>
<link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>

<link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/site/css/site.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
";
        
        $__internal_10bdbd630eb42bde5c0bf95e573bc9ba45c56ce29b0af14e1538ca02567cdbf4->leave($__internal_10bdbd630eb42bde5c0bf95e573bc9ba45c56ce29b0af14e1538ca02567cdbf4_prof);

    }

    public function getTemplateName()
    {
        return "layouts/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 10,  34 => 8,  30 => 7,  22 => 1,);
    }
}
/* <meta charset="utf-8">*/
/* <meta name="description" content="Questionnaire app">*/
/* <meta name="author" content="Edvinas">*/
/* */
/* <title>Questionnaires</title>*/
/* */
/* <link href="{{ asset('bundles/site/img/favicon-96x96.png') }}" rel="icon" type="image/x-icon" sizes="192x192"/>*/
/* <link href="{{ asset('bundles/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>*/
/* */
/* <link href="{{ asset('bundles/site/css/site.css') }}" rel="stylesheet"/>*/
/* */
