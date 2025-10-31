{**
 * Nusantara Theme override - halaman login pengguna.
 * Membangun ulang antarmuka login dengan kartu modern tanpa mengubah logika OJS.
 *}
{include file="frontend/components/header.tpl" pageTitle="user.login"}

{capture assign=registerUrl}{url page="user" op="register" source=$source}{/capture}

<div class="nusantara-auth">
	<div class="nusantara-auth__container">
		<section class="nusantara-auth__intro">
			<p class="nusantara-auth__eyebrow">{translate key="plugins.themes.nusantara.hero.siteLabel"}</p>
			<h1 class="nusantara-auth__title">{translate key="user.login"}</h1>
			<p class="nusantara-auth__subtitle">
				{translate key="plugins.themes.nusantara.auth.subtitle"}
			</p>

			{if !$disableUserReg}
				<p class="nusantara-auth__registerHint">
					{translate key="plugins.themes.nusantara.auth.registerPrompt" registerUrl=$registerUrl}
				</p>
			{/if}
		</section>

		<div class="nusantara-auth__card">
			<div class="nusantara-auth__breadcrumbs">
				{include file="frontend/components/breadcrumbs.tpl" currentTitleKey="user.login"}
			</div>

			{if $loginMessage}
				<div class="nusantara-auth__alert nusantara-auth__alert--info">
					{translate key=$loginMessage}
				</div>
			{/if}

			<form class="cmp_form cmp_form--auth" id="login" method="post" action="{$loginUrl}" role="form">
				{csrf}

				{if $error}
					<div class="nusantara-auth__alert nusantara-auth__alert--error">
						{translate key=$error reason=$reason}
					</div>
				{/if}

				<input type="hidden" name="source" value="{$source|default:""|escape}" />

				<fieldset class="nusantara-auth__fieldset">
					<legend class="pkp_screen_reader">{translate key="user.login"}</legend>

					<label class="nusantara-auth__field">
						<span class="nusantara-auth__label">
							{translate key="user.usernameOrEmail"}
							<span class="nusantara-auth__required" aria-hidden="true">*</span>
							<span class="pkp_screen_reader">{translate key="common.required"}</span>
						</span>
						<input class="nusantara-auth__input" type="text" name="username" id="username" value="{$username|default:""|escape}" required aria-required="true" autocomplete="username">
					</label>

					<label class="nusantara-auth__field">
						<span class="nusantara-auth__label">
							{translate key="user.password"}
							<span class="nusantara-auth__required" aria-hidden="true">*</span>
							<span class="pkp_screen_reader">{translate key="common.required"}</span>
						</span>
						<div class="nusantara-auth__passwordRow">
							<input class="nusantara-auth__input" type="password" name="password" id="password" value="{$password|default:""|escape}" maxlength="32" required aria-required="true" autocomplete="current-password">
							<a class="nusantara-auth__link" href="{url page="login" op="lostPassword"}">
								{translate key="user.login.forgotPassword"}
							</a>
						</div>
					</label>

					<label class="nusantara-auth__checkbox">
						<input type="checkbox" name="remember" id="remember" value="1" {if $remember}checked{/if}>
						<span>{translate key="user.login.rememberUsernameAndPassword"}</span>
					</label>

					{if $recaptchaPublicKey}
						<fieldset class="nusantara-auth__captcha">
							<legend class="pkp_screen_reader">reCAPTCHA</legend>
							<div class="g-recaptcha" data-sitekey="{$recaptchaPublicKey|escape}"></div>
							<label for="g-recaptcha-response" class="pkp_screen_reader">Recaptcha response</label>
						</fieldset>
					{/if}

					{if $altchaEnabled}
						<fieldset class="nusantara-auth__captcha">
							<legend class="pkp_screen_reader">Altcha</legend>
							<altcha-widget challengejson='{$altchaChallenge|@json_encode}' floating></altcha-widget>
						</fieldset>
					{/if}

					<div class="nusantara-auth__actions">
						<button class="nusantara-button nusantara-button--filled" type="submit">
							{translate key="user.login"}
						</button>

						{if !$disableUserReg}
							<a class="nusantara-button nusantara-button--ghost" href="{$registerUrl}">
								{translate key="user.login.registerNewAccount"}
							</a>
						{/if}
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

{include file="frontend/components/footer.tpl"}
