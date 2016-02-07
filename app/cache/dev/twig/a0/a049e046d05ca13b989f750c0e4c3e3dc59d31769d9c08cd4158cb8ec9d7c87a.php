<?php

/* authentication/register.form.html.twig */
class __TwigTemplate_7f93939608d0a281784c2d4c1005da7ceab963684701dc9922dcb9ba9a96253f extends Twig_Template
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
        $__internal_291f1cc15091af6fd33bd0bb2cfbae1ecfa9c45b9a52f5ae84995c25bf9fa0c2 = $this->env->getExtension("native_profiler");
        $__internal_291f1cc15091af6fd33bd0bb2cfbae1ecfa9c45b9a52f5ae84995c25bf9fa0c2->enter($__internal_291f1cc15091af6fd33bd0bb2cfbae1ecfa9c45b9a52f5ae84995c25bf9fa0c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "authentication/register.form.html.twig"));

        // line 1
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "bootstrap_3_layout.html.twig"));
        // line 2
        echo "
";
        // line 3
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "

";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username", array()), 'row');
        echo "
";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email", array()), 'row');
        echo "
";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "password", array()), "first", array()), 'row');
        echo "
";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "password", array()), "second", array()), 'row');
        echo "

<div style=\"margin-top:10px\" class=\"form-group\">
    <button type=\"submit\" class=\"btn btn-primary\">Register</button>
</div>
<div class=\"form-group\">
    <div style=\"border-top: 1px solid#888; padding-top:15px; font-size:85%\">
        Have an account?
        <a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("user_login");
        echo "\">
            Login here
        </a>
    </div>
</div>
";
        // line 21
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        
        $__internal_291f1cc15091af6fd33bd0bb2cfbae1ecfa9c45b9a52f5ae84995c25bf9fa0c2->leave($__internal_291f1cc15091af6fd33bd0bb2cfbae1ecfa9c45b9a52f5ae84995c25bf9fa0c2_prof);

    }

    public function getTemplateName()
    {
        return "authentication/register.form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 21,  55 => 16,  44 => 8,  40 => 7,  36 => 6,  32 => 5,  27 => 3,  24 => 2,  22 => 1,);
    }
}
/* {% form_theme form 'bootstrap_3_layout.html.twig' %}*/
/* */
/* {{ form_start(form) }}*/
/* */
/* {{ form_row(form.username) }}*/
/* {{ form_row(form.email) }}*/
/* {{ form_row(form.password.first) }}*/
/* {{ form_row(form.password.second) }}*/
/* */
/* <div style="margin-top:10px" class="form-group">*/
/*     <button type="submit" class="btn btn-primary">Register</button>*/
/* </div>*/
/* <div class="form-group">*/
/*     <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">*/
/*         Have an account?*/
/*         <a href="{{ path('user_login') }}">*/
/*             Login here*/
/*         </a>*/
/*     </div>*/
/* </div>*/
/* {{ form_end(form) }}*/
