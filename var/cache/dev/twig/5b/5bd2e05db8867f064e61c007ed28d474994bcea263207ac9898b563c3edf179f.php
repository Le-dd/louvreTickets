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
    <section class=\"container \">
      <div class=\"part1\">
        <h1>Choisissez vos billets</h1>
          ";
        // line 15
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 15, $this->source); })()), 'form_start');
        echo "
            ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 16, $this->source); })()), "name", array()), 'row', array("attr" => array("placeholder" => "Nom"), "label" => "Votre nom"));
        echo "
            ";
        // line 17
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 17, $this->source); })()), "firstName", array()), 'row', array("attr" => array("placeholder" => "Prénom"), "label" => "Votre prénom"));
        echo "
            ";
        // line 18
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 18, $this->source); })()), "country", array()), 'row', array("attr" => array("placeholder" => "Pays"), "label" => "Votre pays"));
        echo "
            ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 19, $this->source); })()), "typeId", array()), 'row', array("label" => "Vous venez visiter pour:"));
        echo "
            ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 20, $this->source); })()), "visitDate", array()), 'row', array("attr" => array("class" => "datepicker"), "label" => "le jour de votre visite"));
        echo "
            ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 21, $this->source); })()), "birthDate", array()), 'row', array("attr" => array("class" => "datepicker lastForm", "placeholder" => "Votre date de naissance"), "label" => "Votre date d'anniversaire"));
        echo "
            ";
        // line 22
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 22, $this->source); })()), "rateId", array()), 'row', array("label" => "faite vous partie d'un régime speciale (étudiant,militaire...)"));
        echo "

            <button type=\"submit\" class=\"btn btn-danger\">Ajouter un billet</button>

          ";
        // line 26
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formBooking"]) || array_key_exists("formBooking", $context) ? $context["formBooking"] : (function () { throw new Twig_Error_Runtime('Variable "formBooking" does not exist.', 26, $this->source); })()), 'form_end');
        echo "
        </div>
    </section>
    <section class=\"container part2\">
      <h2>Liste des billets choisis</h2>

      ";
        // line 32
        if ( !(null === (isset($context["formBillet"]) || array_key_exists("formBillet", $context) ? $context["formBillet"] : (function () { throw new Twig_Error_Runtime('Variable "formBillet" does not exist.', 32, $this->source); })()))) {
            // line 33
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["formBillet"]) || array_key_exists("formBillet", $context) ? $context["formBillet"] : (function () { throw new Twig_Error_Runtime('Variable "formBillet" does not exist.', 33, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["billet"]) {
                // line 34
                echo "
      <div class=\"card billet-c\" >
        <div class=\"card-header bg-primary billet-c-h\">
          <p > <span>";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["billet"], "name", array()), "html", null, true);
                echo "</span> <span>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["billet"], "firstName", array()), "html", null, true);
                echo "</span> de ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["billet"], "nameCountry", array()), "html", null, true);
                echo "</p>
          <form  action=\"";
                // line 38
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("billetDelete");
                echo "\" method=\"post\">
            <input type=\"hidden\" name=\"idBillet\" value=\"";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["billet"], "idResponse", array()), "html", null, true);
                echo "\">
            <button type=\"submit\" class=\"btn btn-danger btnCross\">X</button>

          </form>
        </div>
        <div class=\"card-body bg-secondary billet-c-b\">

          <p class=\"card-text billet-c-t\">Visite la ";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["billet"], "nameType", array()), "html", null, true);
                echo "  au tarif \"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["billet"], "nameRate", array()), "html", null, true);
                echo "\" le ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["billet"], "visitDate", array()), "d/m/Y"), "html", null, true);
                echo "</p>

        </div>
      </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['billet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "      <a class=\"btn btn-primary\" href=\"#\">Suivant ►</a>
      ";
        } else {
            // line 53
            echo "      <p class=\"p-blanc\">Venez decouvrir les oeuvre des maitre d'autre ages. Le musée du Louvre vous acceuil, prenez un billet!</p>
      ";
        }
        // line 55
        echo "
    </section>

  </main>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 60
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 61
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
        return array (  228 => 61,  219 => 60,  205 => 55,  201 => 53,  197 => 51,  182 => 46,  172 => 39,  168 => 38,  160 => 37,  155 => 34,  150 => 33,  148 => 32,  139 => 26,  132 => 22,  128 => 21,  124 => 20,  120 => 19,  116 => 18,  112 => 17,  108 => 16,  104 => 15,  98 => 11,  89 => 10,  71 => 8,  59 => 3,  50 => 2,  40 => 1,  38 => 6,  15 => 1,);
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
    <section class=\"container \">
      <div class=\"part1\">
        <h1>Choisissez vos billets</h1>
          {{ form_start(formBooking) }}
            {{ form_row(formBooking.name, { 'attr':{'placeholder': \"Nom\"} , 'label': 'Votre nom' }) }}
            {{ form_row(formBooking.firstName, { 'attr':{'placeholder': \"Prénom\"} ,  'label': 'Votre prénom' }) }}
            {{ form_row(formBooking.country, { 'attr':{'placeholder': \"Pays\"} , 'label': 'Votre pays' }) }}
            {{ form_row(formBooking.typeId, { 'label': 'Vous venez visiter pour:' }) }}
            {{ form_row(formBooking.visitDate, {'attr':{'class': 'datepicker'} , 'label': 'le jour de votre visite' }) }}
            {{ form_row(formBooking.birthDate, {'attr':{'class': 'datepicker lastForm','placeholder': \"Votre date de naissance\"} , 'label': 'Votre date d\\'anniversaire' }) }}
            {{ form_row(formBooking.rateId, { 'label': 'faite vous partie d\\'un régime speciale (étudiant,militaire...)' }) }}

            <button type=\"submit\" class=\"btn btn-danger\">Ajouter un billet</button>

          {{ form_end(formBooking) }}
        </div>
    </section>
    <section class=\"container part2\">
      <h2>Liste des billets choisis</h2>

      {% if formBillet is not null %}
        {% for billet in formBillet %}

      <div class=\"card billet-c\" >
        <div class=\"card-header bg-primary billet-c-h\">
          <p > <span>{{billet.name}}</span> <span>{{billet.firstName}}</span> de {{billet.nameCountry}}</p>
          <form  action=\"{{ path('billetDelete') }}\" method=\"post\">
            <input type=\"hidden\" name=\"idBillet\" value=\"{{billet.idResponse}}\">
            <button type=\"submit\" class=\"btn btn-danger btnCross\">X</button>

          </form>
        </div>
        <div class=\"card-body bg-secondary billet-c-b\">

          <p class=\"card-text billet-c-t\">Visite la {{billet.nameType}}  au tarif \"{{billet.nameRate}}\" le {{billet.visitDate |date(\"d/m/Y\")}}</p>

        </div>
      </div>
      {% endfor %}
      <a class=\"btn btn-primary\" href=\"#\">Suivant ►</a>
      {% else %}
      <p class=\"p-blanc\">Venez decouvrir les oeuvre des maitre d'autre ages. Le musée du Louvre vous acceuil, prenez un billet!</p>
      {% endif %}

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
