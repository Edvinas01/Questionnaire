<?php

/* layouts/footer.html.twig */
class __TwigTemplate_3ec869d657d65b3d2d15934a50243cf5c48de8be77b5b87caa3857306b6d65ce extends Twig_Template
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
        $__internal_a07027f0518c97d81aa3c0561cf5917daad7b24aea4f4d8d5684ca22beed0e9b = $this->env->getExtension("native_profiler");
        $__internal_a07027f0518c97d81aa3c0561cf5917daad7b24aea4f4d8d5684ca22beed0e9b->enter($__internal_a07027f0518c97d81aa3c0561cf5917daad7b24aea4f4d8d5684ca22beed0e9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layouts/footer.html.twig"));

        // line 1
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jquery/js/jquery-2.2.0.min.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
<script src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
<script src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/site/js/layout/global.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>";
        
        $__internal_a07027f0518c97d81aa3c0561cf5917daad7b24aea4f4d8d5684ca22beed0e9b->leave($__internal_a07027f0518c97d81aa3c0561cf5917daad7b24aea4f4d8d5684ca22beed0e9b_prof);

    }

    public function getTemplateName()
    {
        return "layouts/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  27 => 2,  22 => 1,);
    }
}
/* <script src="{{ asset('bundles/jquery/js/jquery-2.2.0.min.js') }}" type="application/javascript"></script>*/
/* <script src="{{ asset('bundles/bootstrap/js/bootstrap.min.js') }}" type="application/javascript"></script>*/
/* <script src="{{ asset('bundles/site/js/layout/global.js') }}" type="application/javascript"></script>*/
