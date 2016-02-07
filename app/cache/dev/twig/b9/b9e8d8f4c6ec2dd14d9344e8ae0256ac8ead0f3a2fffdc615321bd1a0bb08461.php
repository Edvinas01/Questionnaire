<?php

/* home/home.html.twig */
class __TwigTemplate_27805ccd6a80e4794585ee354ecc7d2a2d01b2ab510b372c041106a88ff62eff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/base.html.twig", "home/home.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c9131c86f60b1aca8aac70e17392ae87ff9daeb0b2c3a3b8d7837835c1260bd7 = $this->env->getExtension("native_profiler");
        $__internal_c9131c86f60b1aca8aac70e17392ae87ff9daeb0b2c3a3b8d7837835c1260bd7->enter($__internal_c9131c86f60b1aca8aac70e17392ae87ff9daeb0b2c3a3b8d7837835c1260bd7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "home/home.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c9131c86f60b1aca8aac70e17392ae87ff9daeb0b2c3a3b8d7837835c1260bd7->leave($__internal_c9131c86f60b1aca8aac70e17392ae87ff9daeb0b2c3a3b8d7837835c1260bd7_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_4468b4b36d2ed118b9c3f33652584673a8125d4e9814b45dc89b2d6337554adc = $this->env->getExtension("native_profiler");
        $__internal_4468b4b36d2ed118b9c3f33652584673a8125d4e9814b45dc89b2d6337554adc->enter($__internal_4468b4b36d2ed118b9c3f33652584673a8125d4e9814b45dc89b2d6337554adc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"col-lg-12\">
        <div class=\"page-header\">
            <h1 id=\"containers\">Containers</h1>
        </div>
        <div class=\"bs-component\">
            <div class=\"jumbotron\">
                <h1>Stuff</h1>
                <p>Stuff of stuff</p>
                <p><a class=\"btn btn-primary btn-lg\">Meep</a></p>
            </div>
        </div>
    </div>
";
        
        $__internal_4468b4b36d2ed118b9c3f33652584673a8125d4e9814b45dc89b2d6337554adc->leave($__internal_4468b4b36d2ed118b9c3f33652584673a8125d4e9814b45dc89b2d6337554adc_prof);

    }

    public function getTemplateName()
    {
        return "home/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'layouts/base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div class="col-lg-12">*/
/*         <div class="page-header">*/
/*             <h1 id="containers">Containers</h1>*/
/*         </div>*/
/*         <div class="bs-component">*/
/*             <div class="jumbotron">*/
/*                 <h1>Stuff</h1>*/
/*                 <p>Stuff of stuff</p>*/
/*                 <p><a class="btn btn-primary btn-lg">Meep</a></p>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
