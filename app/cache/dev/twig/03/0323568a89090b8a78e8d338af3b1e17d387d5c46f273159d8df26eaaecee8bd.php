<?php

/* authentication/login.form.html.twig */
class __TwigTemplate_a7317ca10b483b29fa6313177428b1e8bd2d5a8e32d2bb878291733bb79aed56 extends Twig_Template
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
        $__internal_2e7e651aa169580ad31c51630f43331b3afdf0c7cbdc31bc62035e0877fa1607 = $this->env->getExtension("native_profiler");
        $__internal_2e7e651aa169580ad31c51630f43331b3afdf0c7cbdc31bc62035e0877fa1607->enter($__internal_2e7e651aa169580ad31c51630f43331b3afdf0c7cbdc31bc62035e0877fa1607_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "authentication/login.form.html.twig"));

        // line 1
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 2
            echo "    <div class=\"alert alert-danger col-sm-12\">
        ";
            // line 3
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "
    </div>
";
        }
        // line 6
        echo "
<form action=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">

    <div style=\"margin-bottom: 25px\" class=\"input-group\">
        <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-user\"></i></span>
        <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" placeholder=\"username\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" />
    </div>

    <div style=\"margin-bottom: 25px\" class=\"input-group\">
        <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-lock\"></i></span>
        <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"password\" name=\"_password\" />
    </div>

    <div style=\"margin-top:10px\" class=\"form-group\">
        <button type=\"submit\" class=\"btn btn-success\">Login</button>
    </div>
    <div class=\"form-group\">
        <div style=\"border-top: 1px solid#888; padding-top:15px; font-size:85%\" >
            Don't have an account!
            <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("user_registration");
        echo "\">
                Sign Up Here
            </a>
        </div>
    </div>
</form>";
        
        $__internal_2e7e651aa169580ad31c51630f43331b3afdf0c7cbdc31bc62035e0877fa1607->leave($__internal_2e7e651aa169580ad31c51630f43331b3afdf0c7cbdc31bc62035e0877fa1607_prof);

    }

    public function getTemplateName()
    {
        return "authentication/login.form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 25,  43 => 11,  36 => 7,  33 => 6,  27 => 3,  24 => 2,  22 => 1,);
    }
}
/* {% if error %}*/
/*     <div class="alert alert-danger col-sm-12">*/
/*         {{ error.messageKey|trans(error.messageData, 'security') }}*/
/*     </div>*/
/* {% endif %}*/
/* */
/* <form action="{{ path('login_check') }}" method="post">*/
/* */
/*     <div style="margin-bottom: 25px" class="input-group">*/
/*         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>*/
/*         <input type="text" class="form-control" id="username" name="_username" placeholder="username" value="{{ last_username }}" />*/
/*     </div>*/
/* */
/*     <div style="margin-bottom: 25px" class="input-group">*/
/*         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>*/
/*         <input type="password" class="form-control" id="password" placeholder="password" name="_password" />*/
/*     </div>*/
/* */
/*     <div style="margin-top:10px" class="form-group">*/
/*         <button type="submit" class="btn btn-success">Login</button>*/
/*     </div>*/
/*     <div class="form-group">*/
/*         <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >*/
/*             Don't have an account!*/
/*             <a href="{{ path('user_registration') }}">*/
/*                 Sign Up Here*/
/*             </a>*/
/*         </div>*/
/*     </div>*/
/* </form>*/
