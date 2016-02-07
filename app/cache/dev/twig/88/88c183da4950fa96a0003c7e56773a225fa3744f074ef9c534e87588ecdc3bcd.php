<?php

/* layouts/base.html.twig */
class __TwigTemplate_7c9058b038e7eda33b9793e200dc7f66ee7c0d2b43925f46c4ba94e7a8e79fc1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0014c6352b8859214046f965f2842100befb74239378f5c21a41692d9a4badc8 = $this->env->getExtension("native_profiler");
        $__internal_0014c6352b8859214046f965f2842100befb74239378f5c21a41692d9a4badc8->enter($__internal_0014c6352b8859214046f965f2842100befb74239378f5c21a41692d9a4badc8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layouts/base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    ";
        // line 4
        $this->loadTemplate("layouts/header.html.twig", "layouts/base.html.twig", 4)->display($context);
        // line 5
        echo "</head>
<body>
";
        // line 7
        $this->loadTemplate("layouts/navbar.html.twig", "layouts/base.html.twig", 7)->display($context);
        // line 8
        echo "<div class=\"container\">
    <div id=\"main\" class=\"row\">
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "    </div>
</div>
";
        // line 13
        $this->loadTemplate("layouts/footer.html.twig", "layouts/base.html.twig", 13)->display($context);
        // line 14
        echo "</body>
</html>";
        
        $__internal_0014c6352b8859214046f965f2842100befb74239378f5c21a41692d9a4badc8->leave($__internal_0014c6352b8859214046f965f2842100befb74239378f5c21a41692d9a4badc8_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_adb01a2cff8c7f103cbadb4d1e6dbd1bfd8bdbbbcaaf1ba7a5743d271fbcff21 = $this->env->getExtension("native_profiler");
        $__internal_adb01a2cff8c7f103cbadb4d1e6dbd1bfd8bdbbbcaaf1ba7a5743d271fbcff21->enter($__internal_adb01a2cff8c7f103cbadb4d1e6dbd1bfd8bdbbbcaaf1ba7a5743d271fbcff21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_adb01a2cff8c7f103cbadb4d1e6dbd1bfd8bdbbbcaaf1ba7a5743d271fbcff21->leave($__internal_adb01a2cff8c7f103cbadb4d1e6dbd1bfd8bdbbbcaaf1ba7a5743d271fbcff21_prof);

    }

    public function getTemplateName()
    {
        return "layouts/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 10,  48 => 14,  46 => 13,  42 => 11,  40 => 10,  36 => 8,  34 => 7,  30 => 5,  28 => 4,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     {% include 'layouts/header.html.twig' %}*/
/* </head>*/
/* <body>*/
/* {% include 'layouts/navbar.html.twig' %}*/
/* <div class="container">*/
/*     <div id="main" class="row">*/
/*         {% block body %}{% endblock %}*/
/*     </div>*/
/* </div>*/
/* {% include 'layouts/footer.html.twig' %}*/
/* </body>*/
/* </html>*/
