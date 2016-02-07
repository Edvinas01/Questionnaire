<?php

/* layouts/includes.html.twig */
class __TwigTemplate_64c7d42a7309a034009a6cc5f287c6612d5956ff4adfc6698886380116cb425a extends Twig_Template
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
        $__internal_3059bc4cd8156acb1d238384b3909ddfa782c09e5947fc440d709550932b844c = $this->env->getExtension("native_profiler");
        $__internal_3059bc4cd8156acb1d238384b3909ddfa782c09e5947fc440d709550932b844c->enter($__internal_3059bc4cd8156acb1d238384b3909ddfa782c09e5947fc440d709550932b844c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layouts/includes.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    ";
        // line 4
        $this->loadTemplate("layouts/header.html.twig", "layouts/includes.html.twig", 4)->display($context);
        // line 5
        echo "</head>
<body>
<div class=\"container\">
    <div id=\"main\" class=\"row\">
        ";
        // line 9
        $this->displayBlock('body', $context, $blocks);
        // line 10
        echo "    </div>
</div>
";
        // line 12
        $this->loadTemplate("layouts/footer.html.twig", "layouts/includes.html.twig", 12)->display($context);
        // line 13
        echo "</body>
</html>";
        
        $__internal_3059bc4cd8156acb1d238384b3909ddfa782c09e5947fc440d709550932b844c->leave($__internal_3059bc4cd8156acb1d238384b3909ddfa782c09e5947fc440d709550932b844c_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_bf2cc067503c742ed3175bc8c6658d944ce2b057dd70b007be1b6caa3f0dd107 = $this->env->getExtension("native_profiler");
        $__internal_bf2cc067503c742ed3175bc8c6658d944ce2b057dd70b007be1b6caa3f0dd107->enter($__internal_bf2cc067503c742ed3175bc8c6658d944ce2b057dd70b007be1b6caa3f0dd107_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_bf2cc067503c742ed3175bc8c6658d944ce2b057dd70b007be1b6caa3f0dd107->leave($__internal_bf2cc067503c742ed3175bc8c6658d944ce2b057dd70b007be1b6caa3f0dd107_prof);

    }

    public function getTemplateName()
    {
        return "layouts/includes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 9,  44 => 13,  42 => 12,  38 => 10,  36 => 9,  30 => 5,  28 => 4,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     {% include 'layouts/header.html.twig' %}*/
/* </head>*/
/* <body>*/
/* <div class="container">*/
/*     <div id="main" class="row">*/
/*         {% block body %}{% endblock %}*/
/*     </div>*/
/* </div>*/
/* {% include 'layouts/footer.html.twig' %}*/
/* </body>*/
/* </html>*/
