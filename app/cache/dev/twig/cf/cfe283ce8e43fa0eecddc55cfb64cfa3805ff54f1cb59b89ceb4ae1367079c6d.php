<?php

/* home/information.html.twig */
class __TwigTemplate_88b6bb424c055f264f2e14fec701eda5eb7402b75fc4ffc594894f71b946edfa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/base.html.twig", "home/information.html.twig", 1);
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
        $__internal_efb7f86ca5232bba7f37ea7da3b883c5f9ce35bcebe163836e97ff23f662490e = $this->env->getExtension("native_profiler");
        $__internal_efb7f86ca5232bba7f37ea7da3b883c5f9ce35bcebe163836e97ff23f662490e->enter($__internal_efb7f86ca5232bba7f37ea7da3b883c5f9ce35bcebe163836e97ff23f662490e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "home/information.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_efb7f86ca5232bba7f37ea7da3b883c5f9ce35bcebe163836e97ff23f662490e->leave($__internal_efb7f86ca5232bba7f37ea7da3b883c5f9ce35bcebe163836e97ff23f662490e_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_41c33f40ae0c0cc1262bcf2e47385f8334ba2bc9635d2f1b7abe1fb06577a408 = $this->env->getExtension("native_profiler");
        $__internal_41c33f40ae0c0cc1262bcf2e47385f8334ba2bc9635d2f1b7abe1fb06577a408->enter($__internal_41c33f40ae0c0cc1262bcf2e47385f8334ba2bc9635d2f1b7abe1fb06577a408_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"col-lg-12\">
        Useful links:
        <ul class=\"list-unstyled\">
            <li><a href=\"https://bootswatch.com/lumen/\" target=\"_blank\">Bootstrap theme</a></li>
        </ul>
    </div>
";
        
        $__internal_41c33f40ae0c0cc1262bcf2e47385f8334ba2bc9635d2f1b7abe1fb06577a408->leave($__internal_41c33f40ae0c0cc1262bcf2e47385f8334ba2bc9635d2f1b7abe1fb06577a408_prof);

    }

    public function getTemplateName()
    {
        return "home/information.html.twig";
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
/*         Useful links:*/
/*         <ul class="list-unstyled">*/
/*             <li><a href="https://bootswatch.com/lumen/" target="_blank">Bootstrap theme</a></li>*/
/*         </ul>*/
/*     </div>*/
/* {% endblock %}*/
