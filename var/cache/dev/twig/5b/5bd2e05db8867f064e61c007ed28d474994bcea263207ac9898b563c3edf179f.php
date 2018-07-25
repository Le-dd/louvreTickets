<?php

/* billetterie/index.html.twig */
class __TwigTemplate_fae59332f93f9e3d331c63137d81fbd43759c0f0ca07e9a91192cb07248beb54 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "billetterie/index.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "billetterie/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "billetterie/index.html.twig"));

        // line 6
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 6, $this->source); })()), array(0 => "bootstrap_4_layout.html.twig"), true);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.1/flatpickr.min.css\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.1/themes/dark.css\">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Billeterie : Acceuil ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 11
        echo "  <main class=\"billeterie index \">
    <section class=\"container part1\">
      <h1>Choisissez vos billet</h1>
        ";
        // line 14
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 14, $this->source); })()), 'form_start');
        echo "
          ";
        // line 15
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 15, $this->source); })()), "name", array()), 'row', array("attr" => array("placeholder" => "Nom"), "label" => "Votre nom"));
        echo "
          ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 16, $this->source); })()), "firstName", array()), 'row', array("attr" => array("placeholder" => "Prénom"), "label" => "Votre prénom"));
        echo "
          ";
        // line 17
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 17, $this->source); })()), "country", array()), 'row', array("attr" => array("placeholder" => "Pays"), "label" => "Votre pays"));
        echo "
          ";
        // line 18
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 18, $this->source); })()), "typeId", array()), 'row', array("label" => "Vous venez visiter pour:"));
        echo "
          ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 19, $this->source); })()), "visitDate", array()), 'row', array("attr" => array("class" => "datepicker"), "label" => "le jour de votre visite"));
        echo "
          ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 20, $this->source); })()), "rateId", array()), 'row', array("label" => "Quel type de billet voulez vous?"));
        echo "
          ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 21, $this->source); })()), "birthDate", array()), 'row', array("attr" => array("class" => "datepicker lastForm", "placeholder" => "Votre date de naissance"), "label" => "Votre date d'anniversaire"));
        echo "

          <boutton type=\"submit\" class=\"btn btn-danger\">Ajouter un billet </button>

        ";
        // line 25
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 25, $this->source); })()), 'form_end');
        echo "


    </section>
    <section class=\"container part2\">
      <h2>Liste des billet choisi</h2>



    </section>

  </main>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 38
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 39
        echo "
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.1/flatpickr.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.1/l10n/fr.js\"></script>
<script src=\"/js/MyFlatpickr.js\"></script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "billetterie/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 39,  161 => 38,  138 => 25,  131 => 21,  127 => 20,  123 => 19,  119 => 18,  115 => 17,  111 => 16,  107 => 15,  103 => 14,  98 => 11,  89 => 10,  71 => 8,  59 => 3,  50 => 2,  40 => 1,  38 => 6,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.1/flatpickr.min.css\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.1/themes/dark.css\">
{% endblock %}
{% form_theme formBooking 'bootstrap_4_layout.html.twig' %}

{% block title %} Billeterie : Acceuil {% endblock %}

{% block body %}
  <main class=\"billeterie index \">
    <section class=\"container part1\">
      <h1>Choisissez vos billet</h1>
        {{ form_start(formBooking) }}
          {{ form_row(formBooking.name, { 'attr':{'placeholder': \"Nom\"} , 'label': 'Votre nom' }) }}
          {{ form_row(formBooking.firstName, { 'attr':{'placeholder': \"Prénom\"} ,  'label': 'Votre prénom' }) }}
          {{ form_row(formBooking.country, { 'attr':{'placeholder': \"Pays\"} , 'label': 'Votre pays' }) }}
          {{ form_row(formBooking.typeId, { 'label': 'Vous venez visiter pour:' }) }}
          {{ form_row(formBooking.visitDate, {'attr':{'class': 'datepicker'} , 'label': 'le jour de votre visite' }) }}
          {{ form_row(formBooking.rateId, { 'label': 'Quel type de billet voulez vous?' }) }}
          {{ form_row(formBooking.birthDate, {'attr':{'class': 'datepicker lastForm','placeholder': \"Votre date de naissance\"} , 'label': 'Votre date d\\'anniversaire' }) }}

          <boutton type=\"submit\" class=\"btn btn-danger\">Ajouter un billet </button>

        {{ form_end(formBooking) }}


    </section>
    <section class=\"container part2\">
      <h2>Liste des billet choisi</h2>



    </section>

  </main>
{% endblock %}
{% block javascripts %}

<script src=\"https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.1/flatpickr.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.1/l10n/fr.js\"></script>
<script src=\"/js/MyFlatpickr.js\"></script>

{% endblock %}
", "billetterie/index.html.twig", "J:\\DOCS NE PAS SUPPRIMER\\docs\\en coure de travaille\\openclasseroom\\openclassroom\\p4\\louvreTickets\\templates\\billetterie\\index.html.twig");
    }
}
