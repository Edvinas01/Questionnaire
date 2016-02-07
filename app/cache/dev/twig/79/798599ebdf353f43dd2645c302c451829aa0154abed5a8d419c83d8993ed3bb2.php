<?php

/* home/about.html.twig */
class __TwigTemplate_2541a052778247434469f833613c1d400da58a1cf08276b695e16b2b98252e73 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/base.html.twig", "home/about.html.twig", 1);
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
        $__internal_956d0e80f33891413a3d2a52d26aff2873610971db303edcb594f3a6a97d25a5 = $this->env->getExtension("native_profiler");
        $__internal_956d0e80f33891413a3d2a52d26aff2873610971db303edcb594f3a6a97d25a5->enter($__internal_956d0e80f33891413a3d2a52d26aff2873610971db303edcb594f3a6a97d25a5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "home/about.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_956d0e80f33891413a3d2a52d26aff2873610971db303edcb594f3a6a97d25a5->leave($__internal_956d0e80f33891413a3d2a52d26aff2873610971db303edcb594f3a6a97d25a5_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_3f76067ba38b132ef8ea57057ce7e7556529e200b8212492ad0be9f37485b953 = $this->env->getExtension("native_profiler");
        $__internal_3f76067ba38b132ef8ea57057ce7e7556529e200b8212492ad0be9f37485b953->enter($__internal_3f76067ba38b132ef8ea57057ce7e7556529e200b8212492ad0be9f37485b953_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"col-lg-12\">
        This is the about page
    </div>
";
        
        $__internal_3f76067ba38b132ef8ea57057ce7e7556529e200b8212492ad0be9f37485b953->leave($__internal_3f76067ba38b132ef8ea57057ce7e7556529e200b8212492ad0be9f37485b953_prof);

    }

    public function getTemplateName()
    {
        return "home/about.html.twig";
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
/*         This is the about page*/
/*     </div>*/
/* {% endblock %}*/
