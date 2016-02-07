<?php

/* layouts/navbar.html.twig */
class __TwigTemplate_f8a7d2513f81f75b70918a9d753d3ddca76e30efa484527b26dd79c85c51479e extends Twig_Template
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
        $__internal_82ed371dcacbcf9449f1bb8583ef2e4b75017ae055692016b5dbdc1492e721ff = $this->env->getExtension("native_profiler");
        $__internal_82ed371dcacbcf9449f1bb8583ef2e4b75017ae055692016b5dbdc1492e721ff->enter($__internal_82ed371dcacbcf9449f1bb8583ef2e4b75017ae055692016b5dbdc1492e721ff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layouts/navbar.html.twig"));

        // line 1
        echo "<nav class=\"navbar navbar-default navbar-fixed-top\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\"
                    aria-expanded=\"false\" aria-controls=\"navbar\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"/\">Questionnaires</a>
        </div>
        <div id=\"navbar\" class=\"collapse navbar-collapse\">
            <ul class=\"nav navbar-nav\">
                <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("home");
        echo "\">Home</a></li>
                <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("about");
        echo "\">About</a></li>
                <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("information");
        echo "\">Information</a></li>
            </ul>
            <ul class=\"nav navbar-nav navbar-right\">
                <form role=\"search\" class=\"navbar-form navbar-left\">
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"Search questionnaires...\" class=\"form-control\">
                    </div>
                    <button class=\"btn btn-default\" type=\"submit\">Search</button>
                </form>
                ";
        // line 26
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 27
            echo "                    <li class=\"dropdown\">
                        <a aria-expanded=\"false\"
                           aria-haspopup=\"true\"
                           role=\"button\"
                           data-toggle=\"dropdown\"
                           class=\"dropdown-toggle\"
                           href=\"#\">
                            ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
            echo " <span class=\"caret\"></span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"";
            // line 37
            echo $this->env->getExtension('routing')->getPath("user_logout");
            echo "\">Logout</a></li>
                        </ul>
                    </li>
                ";
        } else {
            // line 41
            echo "                    <a class=\"btn btn-default navbar-btn\" href=\"";
            echo $this->env->getExtension('routing')->getPath("user_login");
            echo "\">Login</a>
                ";
        }
        // line 43
        echo "            </ul>
        </div>
    </div>
</nav>";
        
        $__internal_82ed371dcacbcf9449f1bb8583ef2e4b75017ae055692016b5dbdc1492e721ff->leave($__internal_82ed371dcacbcf9449f1bb8583ef2e4b75017ae055692016b5dbdc1492e721ff_prof);

    }

    public function getTemplateName()
    {
        return "layouts/navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 43,  82 => 41,  75 => 37,  69 => 34,  60 => 27,  58 => 26,  46 => 17,  42 => 16,  38 => 15,  22 => 1,);
    }
}
/* <nav class="navbar navbar-default navbar-fixed-top">*/
/*     <div class="container">*/
/*         <div class="navbar-header">*/
/*             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"*/
/*                     aria-expanded="false" aria-controls="navbar">*/
/*                 <span class="sr-only">Toggle navigation</span>*/
/*                 <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span>*/
/*             </button>*/
/*             <a class="navbar-brand" href="/">Questionnaires</a>*/
/*         </div>*/
/*         <div id="navbar" class="collapse navbar-collapse">*/
/*             <ul class="nav navbar-nav">*/
/*                 <li><a href="{{ path('home') }}">Home</a></li>*/
/*                 <li><a href="{{ path('about') }}">About</a></li>*/
/*                 <li><a href="{{ path('information') }}">Information</a></li>*/
/*             </ul>*/
/*             <ul class="nav navbar-nav navbar-right">*/
/*                 <form role="search" class="navbar-form navbar-left">*/
/*                     <div class="form-group">*/
/*                         <input type="text" placeholder="Search questionnaires..." class="form-control">*/
/*                     </div>*/
/*                     <button class="btn btn-default" type="submit">Search</button>*/
/*                 </form>*/
/*                 {% if app.user %}*/
/*                     <li class="dropdown">*/
/*                         <a aria-expanded="false"*/
/*                            aria-haspopup="true"*/
/*                            role="button"*/
/*                            data-toggle="dropdown"*/
/*                            class="dropdown-toggle"*/
/*                            href="#">*/
/*                             {{ app.user.username }} <span class="caret"></span>*/
/*                         </a>*/
/*                         <ul class="dropdown-menu">*/
/*                             <li><a href="{{ path('user_logout') }}">Logout</a></li>*/
/*                         </ul>*/
/*                     </li>*/
/*                 {% else %}*/
/*                     <a class="btn btn-default navbar-btn" href="{{ path('user_login') }}">Login</a>*/
/*                 {% endif %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/* </nav>*/
